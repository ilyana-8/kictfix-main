@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
<!-- Begin Page Content -->
<div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

     <div class="row">
        <div class="col-md-6">
            {{ session('message') }}
         </div>
    </div>

     <div id="main-content">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">

                          <!-- Profile photo -->
                          <img src="{{ $user->profile_image ? asset($user->profile_image) : '/profile.png' }}" alt="Profile Photo" width="100" height="120" class="mx-auto d-block mb-3">

                             <div>
                                <p>Name: {{ $user->name }}</p>
                                <p>Matric ID: {{ $user->matric_id }}</p>
                                <p>Email: {{ $user->email }}</p>
                                <p>Phone Number: {{ $user->phone_number }}</p>
                            </div>
                       </div>
                  </div>
             </div>
         </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->
@endsection
