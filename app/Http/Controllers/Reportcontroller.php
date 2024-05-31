<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Report;
use App\Models\User;

class ReportController extends Controller
{
    // newReport
    public function newReport()
    {
        // Generate a unique reporting ID using UUID
        $reportingId = time();
        $title = "New Report";

        return view('newReport', compact('title', 'reportingId'));
    }

    public function submitReport(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required',
            'reporting_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048'
        ]);

        try {
            // Create a new report instance
            $report = new Report();
            $report->user_id = Auth::user()->id;
            $report->name = $validatedData['name'];
            $report->reporting_id = $validatedData['reporting_id'];
            $report->title = $validatedData['title'];
            $report->description = $validatedData['description'];
            $report->type = $validatedData['type'];
            $report->status = Report::STATUS_NOT_PROCESS_YET;
            $report->technician_id = 2;

            // Handle file upload
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('attachments', 'public');
                $report->attachment = $filePath;
            }

            // Save the report to the database
            $report->save();

            // Redirect with a success message
            return redirect()->route('account.newReport')->with('success', 'Report submitted successfully!');
        } catch (\Exception $e) {
            // Redirect with an error message
            return redirect()->route('account.newReport')->with('error', 'An error occurred while submitting the report: ' . $e->getMessage());
        }
    }

    public function history()
    {
        // Fetch all reports from the database
        $user = Auth::user();
        $reports = $user->reports;
        $title = "Report History";

        // Pass the reports data to the view
        return view('reportHistory', ['reports' => $reports, 'title' => $title]);
    }

    public function detail($id)
    {
        // Find the report by ID
        $report = Report::findOrFail($id);
        $title = "Report Detail";
        $technician = User::findOrFail($report->technician_id);

        // Pass the report data to the view
        return view('reportDetail', ['report' => $report, 'title' => $title, 'user' => auth()->user(), 'technician' => $technician]);
    }
}
