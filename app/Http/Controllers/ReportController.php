<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TasksExport;

class ReportController extends Controller
{
    // PDF Export

    public function exportPDF()
    {
        $tasks = Task::all();

        $pdf = Pdf::loadView('reports.tasks_pdf', compact('tasks'));

        return $pdf->download('tasks_report.pdf');
    }

    // Excel Export

    public function exportExcel()
    {
        return Excel::download(new TasksExport, 'tasks_report.xlsx');
    }
}