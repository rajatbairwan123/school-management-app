<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NextGen Web Solution - School Management</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-indigo-600 via-purple-600 to-indigo-700">

    <!-- Top Header -->
    <header class="w-full px-8 py-4 flex justify-between items-center text-white">

        <!-- Left -->
        <div class="flex items-center gap-3">
            <div class="text-xl font-semibold tracking-wide">
                NextGen Web Solution
            </div>
        </div>

        <!-- Right -->
        <div class="flex items-center gap-6 text-sm opacity-90">

            <div id="live-time" class="text-sm opacity-80"></div>

            <script>
                function updateTime() {
                    const now = new Date();

                    const options = {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    };

                    document.getElementById('live-time').innerHTML =
                        now.toLocaleString('en-IN', options);
                }

                setInterval(updateTime, 1000);
                updateTime();
            </script>

            <a href="#" class="hover:opacity-100 transition">
                Status
            </a>

            <a href="#" class="hover:opacity-100 transition">
                Help
            </a>

        </div>

    </header>

    <!-- Main Section -->
    <main class="flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
            {{ $slot }}
        </div>

    </main>

    <!-- Footer -->
    <footer class="text-center text-white text-sm opacity-80 pb-6">
        © {{ date('Y') }} NextGen Web Solution. All rights reserved.
    </footer>

</body>

</html>
