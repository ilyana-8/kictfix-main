@extends('layouts.technician')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

    <div class="card shadow mb-3">
        <div class="card-header">
            Report Information
        </div>
        <div class="card-body">
            <form action="{{ route('technician.updateStatus', ['id' => $report->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-0">
                    <label for="reporting_id">Reporting ID</label>
                    <input class="form-control" type="text" id="reporting_id" name="reporting_id" value="{{ $report->reporting_id }}" readonly>
                </div>

                <div class="form-group mt-2">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="" disabled selected>Please Select</option>
                        <option value="not process yet" {{ $report->status === 'not process yet' ? 'selected' : '' }}>Not Process Yet</option>
                        <option value="in progress" {{ $report->status === 'in progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $report->status === 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    @error('status')
                    <small class="text-danger pl-3">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="remark">Remark</label>
                    <textarea class="form-control" id="remark" name="remark" placeholder="Remark" rows="3">{{ old('remark') }}</textarea>
                    @error('remark')
                    <small class="text-danger pl-3">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label for="file">Attachment</label>
                    <input class="form-control-file" type="file" id="file" name="file" />
                    @error('file')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end mb-3">
                    <form action="{{ route('technician.updateStatus', ['id' => $report->id]) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
        </div>
    </div>
</div>
@endsection
