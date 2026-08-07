<?php

namespace App\Http\Controllers;

use App\Exports\TasksExport;
use App\Models\Task;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cache;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function exportPDF()
    {
        $tasks = Cache::remember('tasks_report_pdf', now()->addMinutes(15), function () {
            return Task::all();
        });

        $pdf = Pdf::loadView('reports.tasks_pdf', compact('tasks'));

        return $pdf->download('tasks_report.pdf');
    }

    public function exportExcel()
    {
        Cache::remember('tasks_report_excel', now()->addMinutes(15), function () {
            return Task::all();
        });

        return Excel::download(new TasksExport, 'tasks_report.xlsx');
    }
}