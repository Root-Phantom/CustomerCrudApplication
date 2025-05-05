@extends('layouts.app')
@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3>Edit Customer</h3>
                <a href="{{route('customer.index')}}" class="btn" style="background-color: #4643d3; color: white;">
                    <i class="fas fa-chevron-left"></i> Back
                </a>
            </div>

            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Customer Details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.update', $customer) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <!-- Image Section -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="image" class="form-label">Image</label>
                                    @if($customer->image)
                                        <div class="mb-3">
                                            <img src="{{ asset($customer->image) }}" alt="Customer Image"
                                                 class="img-thumbnail" style="max-width: 200px;">
                                            <p class="text-muted small mt-1">Current image</p>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                           id="image" name="image">
                                    <div class="form-text text-muted">Select a new file to change the image</div>
                                    @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Personal Information -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                           id="first_name" name="first_name" value="{{ $customer->first_name }}">
                                    @error('first_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                           id="last_name" name="last_name" value="{{ $customer->last_name }}">
                                    @error('last_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                           id="email" name="email" value="{{ $customer->email }}">
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                           id="phone" name="phone" value="{{ $customer->phone }}">
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Financial Information -->
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="bank_account_number" class="form-label">Bank Account Number</label>
                                    <input type="text"
                                           class="form-control @error('bank_account_number') is-invalid @enderror"
                                           id="bank_account_number" name="bank_account_number"
                                           value="{{ $customer->bank_account_number }}">
                                    @error('bank_account_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="col-md-12 mb-4">
                                <div class="form-group">
                                    <label for="about" class="form-label">About</label>
                                    <textarea class="form-control @error('about') is-invalid @enderror"
                                              id="about" name="about" rows="4">{{ $customer->about }}</textarea>
                                    @error('about')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-12 mt-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Customer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
