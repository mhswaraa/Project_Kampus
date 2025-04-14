<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 bg-gray-50">
    <!-- Main Container -->
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg fixed h-full">
            <div class="p-4">
                <a href="/" class="flex items-center gap-3 mb-8">
                    <img src="{{ asset('images/logo.png') }}" class="w-10 h-10 rounded-lg" alt="Logo">
                    <span class="text-xl font-bold text-gray-800">Marketing Mazzoni</span>
                </a>
                
                <nav class="space-y-2">
                    <a href="#" class="flex items-center gap-3 p-3 text-gray-700 hover:bg-indigo-50 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                    
                    <a href="#" class="flex items-center gap-3 p-3 text-gray-700 hover:bg-indigo-50 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Profile
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 ml-64 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
                <div class="flex items-center gap-4">
                    <button class="p-2 hover:bg-gray-100 rounded-full">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>
                    </button>
                    <div class="relative">
                        <button class="flex items-center gap-2">
                            <img src="https://ui-avatars.com/api/?name=John+Doe" class="w-8 h-8 rounded-full">
                            <span class="text-gray-700">Maheswara</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-gray-500 text-sm mb-2">Total Users</h3>
                    <p class="text-3xl font-bold text-gray-800">1,234</p>
                    <span class="text-green-500 text-sm">↑ 12% from last month</span>
                </div>
                
                <div class="bg-white p-6 rounded-xl shadow-sm">
                    <h3 class="text-gray-500 text-sm mb-2">Revenue</h3>
                    <p class="text-3xl font-bold text-gray-800">$45,678</p>
                    <span class="text-red-500 text-sm">↓ 3% from last month</span>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="bg-white p-6 rounded-xl shadow-sm mb-8">
                <h2 class="text-lg font-semibold mb-4">Monthly Progress</h2>
                <div class="h-64" id="chart"></div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white p-6 rounded-xl shadow-sm">
                <h2 class="text-lg font-semibold mb-4">Recent Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-indigo-100 rounded-full flex items-center justify-center">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-gray-800">New order received (#1234)</p>
                            <p class="text-sm text-gray-500">2 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Contoh inisialisasi chart
        const ctx = document.getElementById('chart');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Monthly Sales',
                    data: [65, 59, 80, 81, 56, 55],
                    borderColor: '#4F46E5',
                    tension: 0.4
                }]
            }
        });
    </script>
</body>
</html>