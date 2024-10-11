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
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
    <title>Log In</title>
</head>
<body class="dark:bg-dark-background w-full h-svh flex items-center justify-center bg-background">
<div class="w-full h-svh flex items-center justify-center">
    <form action="login/verify" method="POST" class="max-w-sm mx-auto">
        <div class="w-full max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
            <div class="px-6 py-4">
                <div class="flex justify-center mx-auto">
                    <img class="w-auto h-7 sm:h-8" src="images/logo.png" alt="">
                </div>
                <h3 class="mt-3 text-xl font-medium text-center text-gray-600 dark:text-gray-200">Welcome Back</h3>

                <p class="mt-1 text-center text-gray-500 dark:text-gray-400">Login as an administrator</p>

                    <div class="w-full mt-4">
                        <input class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                               type="text" name="email" placeholder="Email Address" aria-label="Email Address"
                               value="<?=
                                   $email
                                   ?? '' ?>"/>
                    </div>
                    <p class="font-inter text-red-500 text-sm"><?= $errors['email'] ?? '' ?></p>

                    <div class="w-full mt-4">
                        <input class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-500 bg-white border rounded-lg dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 focus:border-blue-400 dark:focus:border-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300"
                               type="password" name="password" placeholder="Password" aria-label="Password"/>
                    </div>
                    <p class="font-inter text-red-500 text-sm"><?= $errors['password'] ?? '' ?></p>

                    <div class="flex items-center justify-between mt-4">
                        <button class="px-6 py-2 w-full text-sm font-medium tracking-wide text-white capitalize
                        font-inter
                        transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                            Sign In
                        </button>
                    </div>
                    <p class="font-inter text-red-500 text-sm text-center"><?= $errors['body'] ?? '' ?></p>

            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
