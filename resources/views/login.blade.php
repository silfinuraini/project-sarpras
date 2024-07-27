<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sarpras Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset("src/js/init-alpine.js") }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    {{-- <link rel="stylesheet" href="../src/css/output.css" /> --}}
      @vite('resources/css/app.css')
    <!-- 
    <script>
        if (localStorage.theme === "dark" ||
            (!("theme" in localStorage) &&
                window.matchMedia("(prefers-color-schema: dark)").matches)
        ) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }    
    </script> -->


</head>

<body data-theme="light">
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden"
                        src="../pages/pict/Sarana.png" alt="Office">
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block"
                        src="../assets/img/create-account-office-dark.jpeg" alt="Office">
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Log in
                        </h1>
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                            <input
                                class="input input-bordered bg-white block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Ex. smkn11bdg@gmail.com" fdprocessedid="v23msp">
                        </label>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Kata sandi</span>
                            <input
                                class="block input input-bordered bg-white w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder type="password" fdprocessedid="vihm1l">
                        </label>

                        <hr class="my-8 ">

                        <!-- You should use a button here, as the anchor is only used for the example  -->
                        <a class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            href="./login.html">
                            Masuk
                        </a>

                        <p class="mt-4">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline"
                                href="lupasandi.html">
                                Lupa kata sandi?
                            </a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>