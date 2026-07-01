<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form - Tailwind CSS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    @csrf

    <!-- Login Form -->
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
      

        <h2 class="text-2xl font-semibold text-gray-700 text-center">Login</h2>
        <p class="text-gray-500 text-center mb-6">Sign in to your account</p>

        <form action="{{url('login')}}" method="POST" class="space-y-4">
           @csrf
           @if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div>
                <label for="email" class="block text-gray-600">Email</label>
                <input type="email" id="email" name="email" class="mt-1 block w-full px-4 py-2 border border-[#ED7D0B] rounded-md shadow-sm focus:ring-[#ED7D0B] focus:border-[#ED7D0B] sm:text-sm outline-none" placeholder="Enter your email" required>
            </div>

            <!-- Password Input -->
            <div>
                <label for="password" class="block text-gray-600">Password</label>
                <input type="password" id="password" name="password" class="mt-1 block w-full px-4 py-2 border border-[#ED7D0B] rounded-md shadow-sm focus:ring-[#ED7D0B] focus:border-[#ED7D0B] sm:text-sm outline-none" placeholder="Enter your password" required>
            </div>

            <!-- Remember Me Checkbox -->
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                <label for="remember" class="ml-2 text-gray-600">Remember me</label>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full bg-[#ED7D0B] text-white p-2 rounded-md hover:bg-orange-400 transition-colors">Login</button>
            </div>

            <!-- Forgot Password Link -->
            {{-- <div class="text-center">
                <a href="{{url('register')}}" class="text-blue-500 hover:underline">Forgot your password?</a>
            </div> --}}
        </form>

        <!-- Register Link -->
        {{-- <div class="text-center mt-4">
            <p class="text-gray-600">Don't have an account? 
                <a href="#" class="text-blue-500 hover:underline">Sign up</a>
            </p>
        </div> --}}
    </div>

</body>
</html>
