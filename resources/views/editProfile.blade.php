@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
    <div class="col-md-6">
        {{ session('message') }}
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow h-100 py-2">
                <div class="card-body">

                    <!-- Profile photo -->
                    <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : '/profile.png' }}" alt="Profile Photo" width="100" height="120" class="mx-auto d-block mb-3">

                    <!-- Edit profile form -->
                    <form action="{{ route('account.updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Input fields for editing user information -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ (old('name')) ? old('name') : $user->name }}">
                            @error('name')
                            <small class="text-danger pl-3">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"" id="email" name="email" value="{{ (old('email')) ? old('email') : $user->email }}">
                            @error('email')
                            <small class="text-danger pl-3">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Phone Number:</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ (old('phone_number')) ? old('phone_number') : $user->phone_number }}">
                            @error('phone_number')
                            <small class="text-danger pl-3">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- File input for changing profile image -->
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image:</label>
                            <input type="file" class="form-control @error('profile_image') is-invalid @enderror" id="profile_image" name="profile_image">
                            @if ($errors->has('profile_image'))
                                <div class="invalid-feedback">
                                    <ul>
                                        @foreach ($errors->get('profile_image') as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
