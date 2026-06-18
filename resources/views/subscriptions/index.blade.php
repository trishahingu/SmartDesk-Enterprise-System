<!DOCTYPE html>
<html>
<head>
    <title>Subscription Plans</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <h1 class="text-center mb-5">
        Subscription Plans
    </h1>
    <div class="alert alert-info text-center">
    <h4>Current Plan: {{ $company->plan_type }}</h4>
    <p>Max Users: {{ $company->max_users }}</p>
    <p>Max Projects: {{ $company->max_projects }}</p>
    <p>Storage: {{ $company->storage_limit }}</p>
</div>
    <div class="row">

        <!-- Free Plan -->

        <div class="col-md-4 mb-4">

            <div class="card shadow h-100">

                <div class="card-header bg-primary text-white text-center">

                    <h3>Free</h3>

                </div>

                <div class="card-body text-center">

                    <h2>₹0</h2>

                    <hr>

                    <p>👤 Users: 5</p>

                    <p>📁 Projects: 10</p>

                    <p>💾 Storage: 100 MB</p>

                    <p>📞 Basic Support</p>

                </div>

                <div class="card-footer text-center">

                    <button class="btn btn-primary">
                        Current Plan
                    </button>

                </div>

            </div>

        </div>

        <!-- Pro Plan -->

        <div class="col-md-4 mb-4">

            <div class="card shadow border-success h-100">

                <div class="card-header bg-success text-white text-center">

                    <h3>Pro</h3>

                </div>

                <div class="card-body text-center">

                    <h2>₹499/month</h2>

                    <hr>

                    <p>👤 Users: 50</p>

                    <p>📁 Projects: 100</p>

                    <p>💾 Storage: 5 GB</p>

                    <p>📞 Priority Support</p>

                </div>

                <div class="card-footer text-center">

                   <a href="/subscriptions/upgrade/pro"
   class="btn btn-success">
    Upgrade
</a>

                </div>

            </div>

        </div>

        <!-- Enterprise -->

        <div class="col-md-4 mb-4">

            <div class="card shadow border-dark h-100">

                <div class="card-header bg-dark text-white text-center">

                    <h3>Enterprise</h3>

                </div>

                <div class="card-body text-center">

                    <h2>Custom Pricing</h2>

                    <hr>

                    <p>♾ Unlimited Users</p>

                    <p>♾ Unlimited Projects</p>

                    <p>♾ Unlimited Storage</p>

                    <p>📞 Dedicated Support</p>

                </div>

                <div class="card-footer text-center">

                  <a href="/subscriptions/upgrade/enterprise"
   class="btn btn-dark">
    Upgrade
</a>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>