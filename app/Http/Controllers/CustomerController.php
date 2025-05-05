<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $customers = Customer::when($request->search, function ($query) use ($request) {
            $query->where('first_name', 'like', '%' . $request->search . '%')
                ->orWhere('last_name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('phone', 'like', '%' . $request->search . '%')
                ->orWhere('bank_account_number', 'like', '%' . $request->search . '%');
        })
            ->orderBy('created_at', $request->order == 'asc' ? 'asc' : 'desc')
            ->get();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerStoreRequest $request)
    {
        $validated = $request->validated();

        if (isset($validated['image']) && $request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->store('images', 'public');
            $validated['image'] = '/storage/' . $fileName;
        }

        Customer::create($validated);

        return redirect()->route('customer.index')->with('success', 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customer.details', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerUpdateRequest $request, Customer $customer)
    {
        $validated = $request->validated();

        if (isset($validated['image']) && $request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->store('images', 'public');
            $validated['image'] = '/storage/' . $fileName;
        }

        $hasChanges = false;
        foreach ($validated as $key => $value) {
            if ($customer->$key != $value) {
                $hasChanges = true;
                break;
            }
        }

        if ($hasChanges) {
            $customer->update($validated);
            return redirect()->route('customer.index')->with('success', 'Customer updated successfully');
        } else {
            return redirect()->route('customer.index')->with('info', 'No changes were made to the customer');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customer.index')->with('success', 'Customer deleted successfully');
    }

    public function trashIndex(Request $request)
    {
        $query = Customer::onlyTrashed();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('last_name', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%')
                    ->orWhere('phone', 'like', '%' . $request->search . '%')
                    ->orWhere('bank_account_number', 'like', '%' . $request->search . '%');
            });
        }

        $query->orderBy('deleted_at', $request->order == 'asc' ? 'asc' : 'desc');

        $customers = $query->get();

        return view('customer.trash', compact('customers'));
    }

    public function restore($id)
    {
        $customer = Customer::withTrashed()->findOrFail($id);
        $customer->restore();
        return redirect()->route('customer.trash')->with('success', 'Customer restored successfully');
    }

    public function forceDelete($id)
    {
        $customer = Customer::withTrashed()->findOrFail($id);

        if ($customer->image && File::exists(public_path($customer->image))) {
            File::delete(public_path($customer->image));
        }

        $customer->forceDelete();
        return redirect()->route('customer.trash')->with('success', 'Customer permanently deleted');
    }
}
