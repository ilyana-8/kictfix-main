@extends('layouts.technician')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="col-md-6">
        {{ session('message') }}
    </div>

    <div class="col-md-6 mb-3">
        <div class="card shadow h-100 py-2">
            <div class="card-body">
                <form action="{{ route('technician.updatePassword') }}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="current_password">Old Password</label>
                        <input type="password" class="form-control" id="current_password" name="current_password">
                        @error('current_password')
                            <small class="text-danger pl-3">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="new_password">New Password</label>
                        <input type="password" class="form-control" id="new_password" name="new_password">
                        @error('new_password')
                            <small class="text-danger pl-3">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="repeat_password">Confirm Password</label>
                        <input type="password" class="form-control" id="repeat_password" name="repeat_password">
                        @error('repeat_password')
                            <small class="text-danger pl-3">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Change Password</button>
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
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
