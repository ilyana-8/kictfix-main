@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="card shadow mb-3">
        <div class="card-header">
            Report Form
        </div>

        <div class="card-body">
            <form action="{{ route('account.submitReport') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Reporter Name</label>
                    <input class="form-control" type="text" name="name" value="{{ Auth::user()->name}}" readonly>
                </div>
                <div class="form-group mt-2">
                    <label for="id">Reporting ID</label>
                    <input class="form-control" type="text" name="reporting_id" value="{{ $reportingId }}" readonly>
                </div>

                <div class="form-group mt-2">
                    <label for="title">Report Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" placeholder="Report Title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <small class="text-danger pl-3">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="description">Report Description <span class="text-danger">*</span></label>
                    <textarea id="description" name="description" placeholder="Report Description" class="form-control @error('description') is-invalid @enderror" rows="3">{{ old('description') }}</textarea>
                    @error('description')
                    <small class="text-danger pl-3">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="type">Type of Report <span class="text-danger">*</span></label>
                    <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                        <option value="" disabled selected>Please Select</option>
                        <option value="Air Conditioning" {{ old('type') == 'Air Conditioning' ? 'selected' : '' }}>Air Conditioning</option>
                        <option value="Furniture" {{ old('type') == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                        <option value="Internet" {{ old('type') == 'Internet' ? 'selected' : '' }}>Internet</option>
                        <option value="Toilet(Leakage/Clogged/Others)" {{ old('type') == 'Toilet(Leakage/Clogged/Others)' ? 'selected' : '' }}>Toilet</option>
                        <option value="Teaching Aids" {{ old('type') == 'Teaching Aids' ? 'selected' : '' }}>Teaching Aids</option>
                    </select>
                    @error('type')
                    <small class="text-danger pl-3">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="file">Attachment <small>(optional)</small></label>
                    <input class="form-control @error('file') is-invalid @enderror" type="file" name="file" />
                    @if ($errors->has('file'))
                        <div class="invalid-feedback">
                            <ul>
                                @foreach ($errors->get('file') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <!-- succesful message -->
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <!-- button save -->
                <div class="d-flex justify-content-end my-3">
                    <input type="hidden" name="reporting_id" value="{{ $reportingId }}">
                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Report</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
