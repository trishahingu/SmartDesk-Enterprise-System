@extends('layouts.app')

@section('content')

<div class="container mx-auto p-6">

    <div class="bg-white shadow rounded-lg p-6">

        <h2 class="text-2xl font-bold mb-6">
            Create Company
        </h2>

        <form method="POST" action="/companies">

            @csrf

            <!-- Company Information -->

            <h4 class="text-lg font-semibold mb-3">
                Company Information
            </h4>

            <div class="mb-4">
                <label class="block mb-1">Company Name</label>
                <input type="text"
                       name="name"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Company Email</label>
                <input type="email"
                       name="email"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Phone</label>
                <input type="text"
                       name="phone"
                       class="w-full border rounded p-2">
            </div>

            <div class="mb-6">
                <label class="block mb-1">Address</label>
                <textarea name="address"
                          class="w-full border rounded p-2"></textarea>
            </div>

            <!-- Admin Information -->

            <h4 class="text-lg font-semibold mb-3">
                Company Admin Information
            </h4>

            <div class="mb-4">
                <label class="block mb-1">Admin Name</label>
                <input type="text"
                       name="admin_name"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-4">
                <label class="block mb-1">Admin Email</label>
                <input type="email"
                       name="admin_email"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mb-6">
                <label class="block mb-1">Password</label>
                <input type="password"
                       name="password"
                       class="w-full border rounded p-2"
                       required>
            </div>

            <div class="mt-6">
   <div style="margin-top:20px;">
    <button type="submit"
            style="background:blue;color:white;padding:10px 20px;border:none;">
        Create Company
    </button>
</div>
</div>

        </form>

    </div>

</div>

@endsection