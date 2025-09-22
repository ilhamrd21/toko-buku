<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex">

        <!-- Sidebar (fixed) -->
        <aside class="fixed top-0 left-0 h-screen w-64 bg-white text-gray-700 flex flex-col shadow-lg">
            <!-- Logo -->
            <div class="p-6 flex items-center justify-center border-b">
                <h1 class="text-2xl font-bold text-blue-600">📚 Admin</h1>
            </div>

            <!-- Menu -->
            <nav class="flex-1 p-4 overflow-y-auto">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-100 transition">
                            <span class="text-blue-600">🏠</span>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.data-buku.index') }}" 
                           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-100 transition">
                            <span class="text-blue-600">📚</span>
                            <span class="ml-3">Data Buku</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-100 transition">
                            <span class="text-blue-600">👥</span>
                            <span class="ml-3">Kelola User</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-100 transition">
                            <span class="text-blue-600">📊</span>
                            <span class="ml-3">Laporan</span>
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Logout (pakai modal) -->
            <div x-data="{ open: false }" class="p-4 border-t">
                <button @click="open = true" 
                        class="w-full bg-red-500 text-white py-2 rounded-lg hover:bg-red-600 transition">
                    Logout
                </button>

                <!-- Modal Logout -->
                <div x-show="open" 
                     class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 backdrop-blur-sm z-50">
                    <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
                        <!-- Tombol Close -->
                        <button @click="open = false" 
                                class="absolute top-2 right-2 text-gray-500 hover:text-gray-800">✖</button>

                        <!-- Isi Modal -->
                        <h2 class="text-lg font-bold mb-4">Konfirmasi Logout</h2>
                        <p class="text-sm text-gray-600 mb-4">Apakah kamu yakin ingin keluar dari sistem?</p>

                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <div class="flex justify-end gap-2">
                                <button type="button" @click="open = false" 
                                        class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                                    Batal
                                </button>
                                <button type="submit" 
                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                    Logout
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Content (digeser 64 biar gak ketutup sidebar) -->
        <main class="flex-1 flex flex-col ml-64">
            <!-- Navbar -->
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h1 class="text-xl font-semibold text-gray-700">@yield('title')</h1>
                <span class="text-gray-600">👤 <b>{{ Auth::user()->name }}</b></span>
            </header>

            <!-- Main Content -->
            <section class="p-6">
                @yield('content')
            </section>
        </main>
    </div>

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
