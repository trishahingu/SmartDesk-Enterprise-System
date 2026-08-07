<!DOCTYPE html>
<html>

<head>

    <title>SmartDesk - Invoices</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>

        body{
            background:#f4f8fb;
            font-family:'Segoe UI',sans-serif;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 8px 20px rgba(0,0,0,.08);
        }

        .card-header{
            background:linear-gradient(90deg,#0d6efd,#198754);
            color:white;
            font-size:24px;
            font-weight:600;
            border-radius:15px 15px 0 0 !important;
            padding:18px;
        }

        .table thead{
            background:#0d6efd;
            color:white;
        }

        .table tbody tr:hover{
            background:#f1f9ff;
            transition:.3s;
        }

        .btn-download{
            background:#198754;
            color:white;
            border:none;
        }

        .btn-download:hover{
            background:#157347;
            color:white;
        }

        .status-paid{
            background:#198754;
            color:white;
            padding:5px 10px;
            border-radius:20px;
            font-size:13px;
        }

        .status-pending{
            background:#ffc107;
            color:black;
            padding:5px 10px;
            border-radius:20px;
            font-size:13px;
        }

        .status-cancelled{
            background:#dc3545;
            color:white;
            padding:5px 10px;
            border-radius:20px;
            font-size:13px;
        }

    </style>

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            💳 SmartDesk Invoice Management

        </div>

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                <tr>

                    <th>Invoice No</th>
                    <th>Amount</th>
                    <th>GST</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Billing Date</th>
                    <th>Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($invoices as $invoice)

                    <tr>

                        <td>{{ $invoice->invoice_number }}</td>

                        <td>₹{{ number_format($invoice->amount,2) }}</td>

                        <td>₹{{ number_format($invoice->gst,2) }}</td>

                        <td><strong>₹{{ number_format($invoice->total_amount,2) }}</strong></td>

                        <td>

                            @if($invoice->status=='Paid')

                                <span class="status-paid">Paid</span>

                            @elseif($invoice->status=='Pending')

                                <span class="status-pending">Pending</span>

                            @else

                                <span class="status-cancelled">{{ $invoice->status }}</span>

                            @endif

                        </td>

                        <td>{{ $invoice->billing_date }}</td>

                        <td>

                            <a href="{{ route('invoice.pdf',$invoice->id) }}"
                               class="btn btn-download btn-sm">

                                📄 Download PDF

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7" class="text-center text-muted py-5">

                            No invoices found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>