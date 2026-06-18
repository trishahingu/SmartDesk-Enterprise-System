<!DOCTYPE html>
<html>
<head>
    <title>Subscription Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Upgrade Subscription</h2>

    <div class="card p-4">

        <h4>Enterprise Plan</h4>

        <p>₹999 / Month</p>

        <form method="POST" action="/payment/success">
            @csrf

            <button class="btn btn-success">
                Pay Now
            </button>
        </form>

    </div>

</div>

</body>
</html>