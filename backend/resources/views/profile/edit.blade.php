@extends('layouts.app')

@section('button')
<div>

    <a href="/profile/show" class="btn border ml-3 mb-3">
        <i class="bi bi-person"></i> <!-- Bootstrap Profile Icon -->
    </a>
    <form action="{{ route('logout') }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger mb-3 ml-3">
            <i class="bi bi-box-arrow-right"></i> <!-- Bootstrap Logout Icon -->
        </button>
    </form>

</div>
@endsection


@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row g-4">  <!-- Grid system to create responsive layout -->
                
                <!-- Update Profile Information Section -->
                <div class="col-12 col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Update Profile Information</h5>
                            <div class="max-w-xl">
                                <form method="POST" action="{{ route('profile.update') }}">
                                    @csrf
                                    <!-- Example profile fields -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Update Password Section -->
                <div class="col-12 col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Update Password</h5>
                            <div class="max-w-xl">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    <!-- Password fields -->
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Current Password</label>
                                        <input type="password" class="form-control" id="current_password" name="current_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="new_password" name="new_password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Delete Account Section -->
                <div class="col-12 col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Delete Account</h5>
                            <div class="max-w-xl">
                                <form method="POST" action="{{ route('profile.destroy') }}">
                                    @csrf
                                    <p class="text-danger">Are you sure you want to delete your account? This action is irreversible.</p>
                                    <button type="submit" class="btn btn-danger">Delete Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Log out -->
                <div class="col-12 col-md-2">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Log Out</h5>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger mb-3 ml-3">
                                        <i class="bi bi-box-arrow-right"></i>
                                    </button>
                                </form>
                        </div>
                    </div>
                </div>
            </div> <!-- End of row -->
        </div> <!-- End of container -->
    </div>

@endsection