<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <title>Login</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-xl">
        <h2 class="text-2xl font-semibold text-center text-gray-800">Welcome Back</h2>
        <p class="text-center text-gray-500 mb-6">Sign in to continue</p>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="flex items-center border border-gray-300 rounded-md mt-1 px-3 py-2 focus-within:border-blue-500">
                    <i class="bi bi-envelope text-gray-500 mr-2"></i>
                    <input id="email" type="email" name="email" class="w-full outline-none" required autofocus />
                </div>
            </div>
            
            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <div class="flex items-center border border-gray-300 rounded-md mt-1 px-3 py-2 focus-within:border-blue-500">
                    <i class="bi bi-lock text-gray-500 mr-2"></i>
                    <input id="password" type="password" name="password" class="w-full outline-none" required />
                </div>
            </div>
            
            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between text-sm mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                    <span class="ml-2 text-gray-600">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Forgot password?</a>
            </div>
            
            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md shadow-md hover:bg-blue-700 transition">
                Log in
            </button>
            <p class="text-center text-gray-600 mt-4">Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up here</a></p>

        </form>
    </div>
</body>
</html>
