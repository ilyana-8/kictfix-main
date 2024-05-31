<?php

namespace App\Http\Controllers\technician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReportController extends Controller
{
    public function list()
    {
        // Fetch all reports from the database
        $user = Auth::guard('technician')->user();
        $reports = Report::where('technician_id', $user->id)->get();
        $title = "List of report";

        // Pass the reports data to the view
        return view('technician.manageReport', ['reports' => $reports, 'title' => $title]);
    }

    public function detail($id)
    {
        // Find the report by ID
        $user = Auth::guard('technician')->user();
        $report = Report::with('user')->where('id', $id)->where('technician_id', $user->id)->firstOrFail();
        $title = "Report Detail";

        // Pass the report data to the view
        return view('technician.reportDetail', ['report' => $report, 'title' => $title]);
    }

    public function showUpdateStatusForm($id)
    {
        $user = Auth::guard('technician')->user();
        $report = Report::where('id', $id)->where('technician_id', $user->id)->firstOrFail();
        $title = "Update Report Status";

        return view('technician.reportStatus', ['report' => $report, 'title' => $title]);
    }

    // Method to handle the status update submission
     public function updateStatus(Request $request, $id)
{
          Log::info('Entering updateStatus method.');

         $user = Auth::guard('technician')->user();
         $report = Report::where('id', $id)->where('technician_id', $user->id)->firstOrFail();

         Log::info('Updating status for report: ' . $id);

         $data = $request->validate([
            'status' => 'required|string',
            'remark' => 'nullable|string',
            'file' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx,xls,xlsx',
        ]);

        try {
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('attachments', 'public');
                $report->attachment = $filePath;
            }

            $report->update([
                'status' => $data['status'],
                'remark' => $data['remark'],
            ]);

            return redirect()->route('technician.manageReport')->with('success', 'Report status updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('technician.manageReport')->with('error', 'Failed to update report status: ' . $e->getMessage());
        }
    }

}
