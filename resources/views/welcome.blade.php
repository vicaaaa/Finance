<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FinanceApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">

    <div class="text-center w-full max-w-md px-6">
        <div class="flex justify-center mb-4">
            <div class="bg-blue-600 p-4 rounded-2xl shadow-lg shadow-blue-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                </svg>
            </div>
        </div>

        <h1 class="text-4xl font-bold text-gray-900 mb-2">
            Finance<span class="text-blue-600">App</span>
        </h1>
        <p class="text-gray-500 mb-10 text-lg">Solusi Manajemen Keuangan Modern</p>

        <div class="space-y-4">
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('login') }}" class="w-full sm:w-40 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-full transition duration-300 shadow-md text-center">
                    Log in
                </a>

                <a href="{{ route('register') }}" class="w-full sm:w-40 bg-white border-2 border-blue-600 text-blue-600 hover:bg-blue-50 font-semibold py-3 px-6 rounded-full transition duration-300 text-center">
                    Daftar Akun
                </a>
            </div>

            <div class="flex justify-center">
                <a href="{{ url('/dashboard') }}" class="w-full sm:w-80 bg-blue-100 hover:bg-blue-200 text-blue-700 font-semibold py-3 px-6 rounded-full transition duration-300 text-center">
                    Ke Dashboard
                </a>
            </div>

            @auth
            <div class="mt-4 text-sm text-gray-400 italic">
                Halo, {{ Auth::user()->name }}! Anda sedang masuk.
            </div>
            @endauth

        </div>

        <footer class="mt-20 text-gray-400 text-sm italic">
            &copy; 2026 FinanceApp. All rights reserved.
        </footer>
    </div>

</body>
</html>