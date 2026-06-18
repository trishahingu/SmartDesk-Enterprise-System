<!DOCTYPE html>
<html>
<head>
    <title>Invoices</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1>Invoices</h1>

    <a href="/invoices/generate"
       class="btn btn-success mb-3">
        Generate Invoice
    </a>

    <table class="table table-bordered">

        <thead>

        <tr>
            <th>Invoice No</th>
            <th>Amount</th>
            <th>GST</th>
            <th>Total</th>
            <th>Status</th>
            <th>Date</th>
        </tr>

        </thead>

        <tbody>

        @foreach($invoices as $invoice)

        <tr>

            <td>{{ $invoice->invoice_number }}</td>

            <td>₹{{ $invoice->amount }}</td>

            <td>₹{{ $invoice->gst }}</td>

            <td>₹{{ $invoice->total_amount }}</td>

            <td>{{ $invoice->status }}</td>

            <td>{{ $invoice->billing_date }}</td>
<td>

<a href="/invoice/pdf/{{ $invoice->id }}"
   class="btn btn-primary">

    Download PDF

</a>

</td>
        </tr>

        @endforeach

        </tbody>

    </table>

</div>

</body>
</html>