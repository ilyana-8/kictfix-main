@extends('layouts.app')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="col-md-6">
        {{ session('message') }}
    </div>

    <div class="col-md-6">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <form action="{{ route('account.updatePassword') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="current_password">Old Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password">
                        @error('current_password')
                            <small class="text-danger pl-3">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">New Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <small class="text-danger pl-3">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')
                            <small class="text-danger pl-3">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Change Password</button>
                        <!-- succesful message -->
                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        <!-- error message -->
                        @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
