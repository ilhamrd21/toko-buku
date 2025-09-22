<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Toko Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-yellow-50 to-blue-100">

    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-bold text-blue-700">📚 Toko Buku</h1>
            <p class="text-gray-600 mt-2">Silakan login untuk melanjutkan</p>
        </div>

        @if($errors->any())
            <p class="text-red-500 text-sm mb-4">{{ $errors->first() }}</p>
        @endif

        <form action="{{ route('login.proses') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">
                Login
            </button>
        </form>

        <p class="text-center text-gray-500 text-sm mt-6">
            Belum punya akun? <a href="#" class="text-blue-600 hover:underline">Daftar sekarang</a>
        </p>
    </div>

</body>
</html>
