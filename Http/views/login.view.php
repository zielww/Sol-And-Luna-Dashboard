<!doctype html>
<html lang="en" class="">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dist/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
          rel="stylesheet">
    <title>Log In</title>
</head>
<body class="dark:bg-dark-background w-full h-svh flex items-center justify-center">
<form method="POST" action="/login" class="min-h-screen w-full flex flex-col lg:flex-row">
    <!-- Left side - Login Form -->
    <div class="w-full lg:w-1/2 p-8 flex items-center justify-center">
        <div class="w-full max-w-md">
            <!-- Logo -->
            <div class="flex items-center gap-2 mb-12">
                <img class="w-8 h-8 rounded-full border border-gray-200" src="images/logo.svg" alt="">
                <span class="text-xl font-semibold font-sans">Sol&Luna</span>
            </div>

            <!-- Main Content -->
            <div class="space-y-6">
                <div>
                    <p class="text-gray-600">Start your journey</p>
                    <h1 class="text-2xl font-semibold mt-1">Sign In to Sol&Luna</h1>
                </div>

                <!-- Email Input -->
                <div class="space-y-2">
                    <label class="block text-sm text-gray-600">E-mail</label>
                    <div class="relative">
                        <label>
                            <input
                                    type="email"
                                    name="email"
                                    value="<?= $email ?? '' ?>"
                                    placeholder="example@email.com"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500"
                            />
                        </label>
                        <svg class="w-5 h-5 absolute right-3 top-3.5 text-gray-400" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <p class="text-sm font-sans text-red-500"><?= $errors['email'] ?? '' ?></p>
                </div>

                <!-- Password Input -->
                <div class="space-y-2">
                    <label class="block text-sm text-gray-600">Password</label>
                    <div class="relative">
                        <label>
                            <input
                                    type="password"
                                    name="password"
                                    placeholder="••••••••"
                                    class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500"
                            />
                        </label>
                        <svg class="w-5 h-5 absolute right-3 top-3.5 text-gray-400" fill="none" stroke="currentColor"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                    <p class="text-sm font-sans text-red-500"><?= $errors['password'] ?? '' ?></p>
                </div>

                <!-- Sign Up Button -->
                <?php if ($errors['body'] ?? false) : ?>
                    <p class="text-sm font-sans text-red-500 text-center"><?= $errors['body'] ?? '' ?></p>
                <?php endif; ?>
                <button class="w-full py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
                    Sign Up
                </button>

                <!-- Divider -->
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">or sign in with</span>
                    </div>
                </div>

                <!-- Social Login Buttons -->
                <div class="grid grid-cols-3 gap-4">
                    <button class="p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="flex justify-center">
                            <svg class="w-5 h-5 text-blue-600" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </div>
                    </button>
                    <button class="p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="flex justify-center">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path fill="#4285F4"
                                      d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                                <path fill="#34A853"
                                      d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                                <path fill="#FBBC05"
                                      d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                                <path fill="#EA4335"
                                      d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                            </svg>
                        </div>
                    </button>
                    <button class="p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="flex justify-center">
                            <svg class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M17.05 20.28c-.98.95-2.05.88-3.08.54-1.07-.36-2.06-.35-3.17 0-1.4.44-2.13.37-3.02-.53C4.26 16.89 3.85 12.47 6.56 9.9c1.58-1.5 3.24-1.05 4.83-.5 1.5.52 2.23.52 3.73 0 1.76-.61 3.13-.49 4.46.69l-3.23 3.12c-1.69-1.93-4.34-1.45-5.42.47-1.34 2.37.06 5.02 2.79 5.58 2.08.43 3.85-.71 4.98-2.98h-4.72v-4.14h8.62c-.06.89-.15 1.75-.35 2.71-.63 3.05-2.38 5.02-5.2 5.43zm0 0"/>
                            </svg>
                        </div>
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center text-gray-600">
                    Administrator only | <a href="#" class="text-orange-500 hover:text-orange-600 hover:underline">Contact
                        us</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Right side - Background Pattern -->
    <div class="w-full lg:w-1/2 relative overflow-hidden bg-cover"
         style="background-image: url('images/bg.jpg');">
    </div>

</form>

</body>
</html>
