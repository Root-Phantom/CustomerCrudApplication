@extends('layouts.app')
@section('content')
    <div class="row py-5 px-4">
        <div class="col-md-5 mx-auto">
            <a href="{{ route('customer.index') }}" class="btn mb-3" style="background-color: #4643d3; color: white;">
                <i class="fas fa-chevron-left"></i> Back
            </a>
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-4 pb-4 cover"
                     style="background-color: #6b68e3; background-image: linear-gradient(to bottom, #7673e8, #5d5ad8);">
                    <div class="media align-items-end profile-head d-flex">
                        <div class="profile mr-3 mt-3 me-4">
                            @if($customer->image)
                                <img src="{{ asset($customer->image) }}" alt="{{ $customer->first_name }}'s photo"
                                     width="130" class="rounded mb-2 img-thumbnail">
                            @endif
                        </div>
                        <div class="media-body mb-3 text-white mt-4">
                            <h4 class="mt-0 mb-2">{{ $customer->first_name }} {{ $customer->last_name }}</h4>
                            <p class="small mb-4">{{ $customer->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <div class="p-4 rounded shadow-sm bg-light">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td style="width: 250px;" class="fw-bold">First Name</td>
                                <td>{{ $customer->first_name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;" class="fw-bold">Last Name</td>
                                <td>{{ $customer->last_name }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;" class="fw-bold">Email</td>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;" class="fw-bold">Phone</td>
                                <td>{{ $customer->phone }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;" class="fw-bold">Bank Account Number</td>
                                <td>{{ $customer->bank_account_number }}</td>
                            </tr>
                            <tr>
                                <td style="width: 250px;" class="fw-bold">About</td>
                                <td>{{ $customer->about }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
