<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Blue Waves</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .signup-container {
            background-image: url('images/1734444481738.jpg');
            background-size: cover;
            background-position: center;
        }
        .input-field {
            background-color: rgba(255, 255, 255, 0.7);
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            width: 100%;
            margin-bottom: 16px;
        }
        .signup-button {
            background-color: #ffd700;
            color: black;
            font-weight: bold;
            border-radius: 20px;
            padding: 10px 40px;
            transition: all 0.3s ease;
        }
        .signup-button:hover {
            background-color: #f5cb00;
            transform: translateY(-2px);
        }
        .label {
            color: white;
            font-size: 14px;
            margin-bottom: 4px;
        }
    </style>
</head>
<body class="m-0 p-0">
    <div class="signup-container flex items-center justify-center">
        <div class="w-full max-w-md p-8">
          <!-- Logo -->
        <div class="">
            <img src="/images/Design_sans_titre_13.png" alt="logo"  class="h-12">
        </div>  
            <div class="mt-6 text-center">
                <h2 class="text-3xl font-bold text-white mb-2">sign up</h2>
                <p class="text-white mb-6">If you have account? <a href="{{ route('login') }}" class="text-yellow-300 hover:underline">Login</a></p>
            </div>

            @if ($errors->any())
                <div class="mb-4 text-red-600 bg-white bg-opacity-70 p-3 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-4 mt-6 ">
                @csrf
            
                <div>
                    <label for="name" class="block label font-bold">First Name:</label>
                    <input type="text" name="name" id="name" class="input-field" required>
                </div>
            
                <div>
                    <label for="email" class="block label font-bold">Email:</label>
                    <input type="email" name="email" id="email" class="input-field" required>
                </div>
                                <div>
                    <label for="phone" class="block label font-bold">Phone Number:</label>
                    <input type="text" name="phone" id="phone" class="input-field" required>
                </div>
                <div class="flex gap-1 ">
                <div>
                    <label for="password" class="block label font-bold">Password:</label>
                    <input type="password" name="password" id="password" class="input-field" required>
                </div>
            
                <div>
                    <label for="password_confirmation" class="block label font-bold">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="input-field" required>
                </div>
                </div>
            
                <input type="hidden" name="nationality" id="nationality" value="">
            
                <div class="flex justify-center pt-4">
                    <button type="submit" class="signup-button">
                        Sign Up
                    </button>
                </div>
            </form>            
        </div>
    </div>
</body>
</html>