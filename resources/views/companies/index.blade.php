@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

   <div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold">
            🏢 Companies
        </h2>

        <p class="text-muted mb-0">
            Manage all companies registered in SmartDesk.
        </p>
    </div>

    <a href="{{ url('/companies/create') }}"
       class="btn btn-primary btn-lg">

        <i class="bi bi-plus-circle"></i> Add Company

    </a>


</div>

    <div class="grid grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">

<h4 class="text-gray-500">

Total Companies

</h4>

<h2 class="text-4xl font-bold mt-3 text-blue-600">

{{ $companies->count() }}

</h2>

</div>

        <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">

<h4 class="text-gray-500">

Free Plan

</h4>

<h2 class="text-4xl font-bold mt-3 text-blue-600">

{{ $companies->count() }}

</h2>

</div>

       <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition">

<h4 class="text-gray-500">

Active Plan 

</h4>

<h2 class="text-4xl font-bold mt-3 text-blue-600">

{{ $companies->count() }}

</h2>

</div>
<div class="mb-5">

<input
type="text"
placeholder="🔍 Search Company..."
class="w-full md:w-80 border rounded-xl p-3">

</div>
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr class="border-b">
                    <th class="text-left p-2">ID</th>
                    <th class="text-left p-2">Company Name</th>
                    <th class="text-left p-2">Email</th>
                    <th class="text-left p-2">Plan</th>
                </tr>
            </thead>

            <tbody>
                @foreach($companies as $company)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-2">{{ $company->id }}</td>
                    <td class="p-2">{{ $company->name }}</td>
                    <td class="p-2">{{ $company->email }}</td>
                    <td class="p-2">
            <span
            class="bg-green-100
            text-green-700
            px-3
            py-1
            rounded-full
            text-sm
            font-semibold">
        {{ $company->subscription_plan }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>
@endsection