<aside class="fixed top-0 left-0 z-40 w-64 h-screen bg-white border-r border-gray-200 shadow-xl">

    <!-- Logo -->
    <div class="h-20 flex items-center justify-center border-b">

        <div class="text-center">

            <h1 class="text-3xl font-bold text-indigo-600">
                🚀 SmartDesk
            </h1>

            <p class="text-sm text-gray-500">
                Enterprise System
            </p>

        </div>

    </div>

    <!-- Menu -->

    <div class="overflow-y-auto h-[calc(100vh-150px)] py-5">

        <nav class="space-y-2 px-4">

            <a href="{{ route('dashboard') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition duration-200 {{ request()->routeIs('dashboard') ? 'bg-indigo-100 text-indigo-600 font-semibold' : 'text-gray-700' }}">

                <i class="bi bi-grid-fill text-lg"></i>

                <span class="ml-3">
                    Dashboard
                </span>

            </a>

            <a href="{{ url('/companies') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition duration-200">

                <i class="bi bi-buildings-fill text-lg"></i>

                <span class="ml-3">
                    Companies
                </span>

            </a>

            <a href="{{ url('/employees') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">

                <i class="bi bi-people-fill text-lg"></i>

                <span class="ml-3">
                    Employees
                </span>

            </a>

            <a href="{{ url('/projects') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">

                <i class="bi bi-folder-fill text-lg"></i>

                <span class="ml-3">
                    Projects
                </span>

            </a>

            <a href="{{ url('/tasks') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">

                <i class="bi bi-check2-square text-lg"></i>

                <span class="ml-3">
                    Tasks
                </span>

            </a>

            <a href="{{ url('/attendance') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">

                <i class="bi bi-calendar-check-fill text-lg"></i>

                <span class="ml-3">
                    Attendance
                </span>

            </a>

            <a href="{{ url('/leave-requests') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">

                <i class="bi bi-calendar-event-fill text-lg"></i>

                <span class="ml-3">
                    Leave
                </span>

            </a>

            <a href="{{ url('/timesheets') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">

                <i class="bi bi-clock-history text-lg"></i>

                <span class="ml-3">
                    Timesheets
                </span>

            </a>

            <a href="{{ route('analytics.index') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">

                <i class="bi bi-bar-chart-fill text-lg"></i>

                <span class="ml-3">
                    Analytics
                </span>

            </a>

            <a href="{{ url('/ai-assistant') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">

                <i class="bi bi-robot text-lg"></i>

                <span class="ml-3">
                    AI Assistant
                </span>

            </a>

            <a href="{{ route('activity.index') }}"
               class="flex items-center px-4 py-3 rounded-xl hover:bg-indigo-50 hover:text-indigo-600 transition">

                <i class="bi bi-activity text-lg"></i>

                <span class="ml-3">
                    Activity
                </span>

            </a>

        </nav>

    </div>

    <!-- User -->

    <div class="absolute bottom-0 w-full border-t bg-white p-4">

        <div class="flex items-center">

            <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=4f46e5&color=ffffff"
                 class="w-12 h-12 rounded-full">

            <div class="ml-3">

                <h6 class="font-semibold">

                    {{ Auth::user()->name }}

                </h6>

                <p class="text-xs text-gray-500">

                    Enterprise User

                </p>

            </div>

        </div>

    </div>

</aside>