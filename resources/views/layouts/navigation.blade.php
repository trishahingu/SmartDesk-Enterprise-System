<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">

<div class="container-fluid">

<a class="navbar-brand fw-bold fs-2 text-primary"
href="/dashboard">

🚀 SmartDesk

</a>

<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbar">

<span
class="navbar-toggler-icon">

</span>

</button>

<div
class="collapse navbar-collapse"
id="navbar">

<ul
class="navbar-nav ms-4">

<li class="nav-item">
<a class="nav-link"
href="/dashboard">
Dashboard
</a>
</li>

<li class="nav-item">
<a class="nav-link"
href="/companies">
Companies
</a>
</li>

<li class="nav-item">
<a class="nav-link"
href="/employees">
Employees
</a>
</li>

<li class="nav-item">
<a class="nav-link"
href="/projects">
Projects
</a>
</li>

<li class="nav-item">
<a class="nav-link"
href="/tasks">
Tasks
</a>
</li>

<li class="nav-item">
<a class="nav-link"
href="/attendance">
Attendance
</a>
</li>

<li class="nav-item">
<a class="nav-link"
href="/analytics">
Analytics
</a>
</li>

<li class="nav-item">
<a class="nav-link"
href="/ai-assistant">
🤖 AI
</a>
</li>

</ul>

<form class="d-flex ms-auto me-4">

<input
class="form-control"
type="search"
placeholder="Search...">

</form>

<div class="dropdown">

<a
class="d-flex align-items-center text-decoration-none dropdown-toggle"
href="#"
data-bs-toggle="dropdown">

<img
src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}"
width="45"
class="rounded-circle">

<div class="ms-2">

<div class="fw-bold">

{{ Auth::user()->name }}

</div>

<small>

{{ Auth::user()->email }}

</small>

</div>

</a>

<ul
class="dropdown-menu dropdown-menu-end">

<li>

<a
class="dropdown-item"
href="/profile">

Profile

</a>

</li>

<li>

<form
method="POST"
action="{{ route('logout') }}">

@csrf

<button
class="dropdown-item">

Logout

</button>

</form>

</li>

</ul>

</div>

</div>

</div>

</nav>