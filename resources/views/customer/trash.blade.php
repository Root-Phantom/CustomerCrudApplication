@extends('layouts.app')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3>Trash Customers</h3>
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-check-circle me-2"></i>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session()->has('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong><i class="fas fa-info-circle me-2"></i>Info!</strong> {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{route('customer.trash')}}" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search anything..."
                                           aria-describedby="button-addon2" name="search" value="{{request()->search}}">
                                    <button class="btn btn-outline-secondary" type="submit"
                                            id="button-addon2">Search
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <form action="{{route('customer.trash')}}" method="GET" class="form-order">
                                <div class="input-group mb-3">
                                    <select class="form-select" name="order" id="" onchange="$('.form-order').submit()">
                                        <option @selected(request()->order=='desc') value="desc">Newest to Old</option>
                                        <option @selected(request()->order=='asc') value="asc">Old to Newest</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{route('customer.index')}}" class="btn btn-dark"><i class="fas fa-undo"></i> Back to Active Customers</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="border: 1px solid #dddddd">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">BAN</th>
                            <th scope="col">Deleted At</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($customers as $customer)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $customer->first_name }}</td>
                                <td>{{ $customer->last_name }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->bank_account_number }}</td>
                                <td>{{ $customer->deleted_at->format('Y-m-d H:i:s') }}</td>
                                <td>
                                    <form method="POST" action="{{ route('customer.restore', $customer) }}"
                                          style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" style="background: none; border: none; color: #28a745;"
                                                class="ms-1 me-1"
                                                onclick="return confirm('Are you sure you want to restore this customer?')">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('customer.forcedelete', $customer) }}"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none; color: #dc3545;"
                                                class="ms-1 me-1"
                                                onclick="return confirm('Are you sure you want to permanently delete this customer? This action cannot be undone!')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="fas fa-trash-alt fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted font-weight-light">No deleted customers found</h5>
                                        <p class="small text-muted">All your customers are active</p>
                                        <a href="{{ route('customer.index') }}"
                                           class="btn btn-sm btn-outline-primary mt-2">
                                            <i class="fas fa-arrow-left me-1"></i> Back to Active Customers
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
