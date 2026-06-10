<html>
    <head>
        <title>Login MyTeam</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-6 rounded-2xl shadow-md w-89">
        <h2 class="text-2xl font-bold mb-4 text-center">Login MyTeam</h2>
       
        <form action="{{ route('login.process') }}" method="post">
            @csrf
            <label for="email" class="text-sm">Email</Label>
            <input type="email" name="email" class="w-full border p-2 mb-3 rounded-2xl" required>

            <label for="password" class="text-sm">Password</Label>
            <input type="password" name="password" class="w-full border p-2 mb-3 rounded-2xl" required>

            <button type="submit" class="w-full bg-blue-500 text-white w-full py-2 rounded-2xl">Login</button>
        </form>
         @error('login_error')
        <p class="text-red-500 text-sm mb-3 text-center">{{ $message }}</p>
        @enderror
    </div>
    </body>
</html>