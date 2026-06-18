<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();

        return view(
            'invoices.index',
            compact('invoices')
        );
    }

    public function downloadPdf($id)
    {
        $invoice = Invoice::findOrFail($id);

        $pdf = Pdf::loadView(
            'invoices.pdf',
            compact('invoice')
        );

        return $pdf->download(
            'Invoice-' .
            $invoice->invoice_number .
            '.pdf'
        );
    }
}