@extends('layouts.app')

@section('content')

<div class="container">

<h2>Create Company</h2>

<form method="POST" action="/companies">

@csrf

<input type="text"
name="name"
placeholder="Company Name"
class="form-control mb-3">

<input type="email"
name="email"
placeholder="Company Email"
class="form-control mb-3">

<input type="text"
name="phone"
placeholder="Phone"
class="form-control mb-3">

<input type="text"
name="address"
placeholder="Address"
class="form-control mb-3">

<button class="btn btn-primary">
Create Company
</button>

</form>

</div>

@endsection