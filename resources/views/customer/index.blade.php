@extends('layouts.app')
@section('content')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3>Customers</h3>
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
                        <div class="col-md-2">
                            <a href="{{route('customer.create')}}" class="btn"
                               style="background-color: #4643d3; color: white;"><i class="fas fa-plus"></i> Create
                                Customer</a>
                        </div>
                        <div class="col-md-6">
                            <form action="{{route('customer.index')}}" method="GET">
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
                            <form action="{{route('customer.index')}}" method="GET" class="form-order">
                                <div class="input-group mb-3">
                                    <select class="form-select" name="order" id="" onchange="$('.form-order').submit()">
                                        <option @selected(request()->order=='desc') value="desc">Newest to Old</option>
                                        <option @selected(request()->order=='asc') value="asc">Old to Newest</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2 text-end">
                            <a href="{{route('customer.trash')}}" class="btn btn-dark"><i class="fas fa-trash-alt"></i></a>
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
                                <td>
                                    <a href="{{route('customer.edit',compact('customer'))}}" style="color: #2c2c2c;"
                                       class="ms-1 me-1"><i
                                            class="far fa-edit"></i></a>
                                    <a href="{{route('customer.show',compact('customer'))}}"
                                       style="color: #2c2c2c;" class="ms-1 me-1"><i
                                            class="far fa-eye"></i></a>
                                    <form method="POST" action="{{ route('customer.destroy', $customer) }}"
                                          style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background: none; border: none; color: #2c2c2c;"
                                                class="ms-1 me-1"
                                                onclick="return confirm('Are you sure you want to delete this customer?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4">
                                    <div class="d-flex flex-column align-items-center">
                                        <i class="fas fa-users-slash fa-3x text-muted mb-3"></i>
                                        <h5 class="text-muted font-weight-light">No customers found</h5>
                                        <p class="small text-muted">Please use the "Add New Customer" button to get
                                            started</p>
                                        <a href="{{ route('customer.create') }}"
                                           class="btn btn-sm btn-outline-primary mt-2">
                                            <i class="fas fa-plus-circle me-1"></i> Add New Customer
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
