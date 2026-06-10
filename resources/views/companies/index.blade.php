@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold">Companies</h2>

        <a href="/companies/create"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            + Add Company
        </a>
    </div>

    <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-gray-500">Total Companies</h3>
            <p class="text-2xl font-bold">
                {{ $companies->count() }}
            </p>
        </div>

        <div class="bg-white shadow rounded p-4">
            <h3 class="text-gray-500">Free Plans</h3>
            <p class="text-2xl font-bold">
                {{ $companies->where('subscription_plan','Free')->count() }}
            </p>
        </div>

        <div class="bg-white shadow rounded p-4">
            <h3 class="text-gray-500">Active Plans</h3>
            <p class="text-2xl font-bold">0</p>
        </div>
    </div>

    <div class="bg-white shadow rounded p-4">

        <table class="table-auto w-full">
            <thead>
                <tr class="border-b">
                    <th class="text-left p-2">ID</th>
                    <th class="text-left p-2">Company Name</th>
                    <th class="text-left p-2">Email</th>
                    <th class="text-left p-2">Plan</th>
                </tr>
            </thead>

            <tbody>
                @foreach($companies as $company)
                <tr class="border-b">
                    <td class="p-2">{{ $company->id }}</td>
                    <td class="p-2">{{ $company->name }}</td>
                    <td class="p-2">{{ $company->email }}</td>
                    <td class="p-2">
                        <span class="bg-green-100 px-2 py-1 rounded">
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