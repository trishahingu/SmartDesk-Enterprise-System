<!DOCTYPE html>
<html>

<head>

    <title>Invoice</title>

</head>

<body>

    <h1>SmartDesk Invoice</h1>

    <hr>

    <p>
        Invoice Number:
        {{ $invoice->invoice_number }}
    </p>

    <p>
        Billing Date:
        {{ $invoice->billing_date }}
    </p>

    <p>
        Amount:
        ₹{{ $invoice->amount }}
    </p>

    <p>
        GST:
        ₹{{ $invoice->gst }}
    </p>

    <p>
        Total Amount:
        ₹{{ $invoice->total_amount }}
    </p>

    <p>
        Status:
        {{ $invoice->status }}
    </p>

</body>

</html>