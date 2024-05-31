
@extends('layouts.app')

@section('content')
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<div class="container">
        <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
        <div class="col-md-12">
            {{ session('message') }}

    <div class="container-fluid">
    <table class="table">
        <thead>
            <tr class="table-header-row">
                <th style="width: 25%;">Reporting ID</th>
                <th style="width: 25%;">Report Date</th>
                <th style="width: 25%;">Status</th>
                <th style="width: 25%;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
                <td>{{ $report->reporting_id }}</td>
                <td>{{ $report->created_at->format('Y-m-d') }}</td>
                <td>
                    @if($report->status === 'not process yet')
                        <span class="badge text-bg-primary">{{ $report->status }}</span>
                    @elseif($report->status === 'in progress')
                        <span class="badge text-bg-warning">{{ $report->status }}</span>
                    @elseif($report->status === 'not forwarded')
                        <span class="badge text-bg-danger">{{ $report->status }}</span>
                    @elseif($report->status === 'completed')
                        <span class="badge text-bg-success">{{ $report->status }}</span>
                    @endif
                </td>
                <td><a href="{{ route('account.reportDetail', ['id' => $report->id]) }}" class="btn btn-link">View Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
