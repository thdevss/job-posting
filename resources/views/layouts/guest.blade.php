<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="dark:bg-gray-900">

        <nav class="bg-white border-gray-200 px-2 lg:px-4 py-2.5 dark:bg-gray-800">
            <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
                <a href="#" class="flex items-center">
                    <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo"> -->
                    <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Job board</span>
                </a>
                <div class="flex items-center lg:order-2">

                    <a href="{{ route('job.new') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 lg:px-5 lg:py-2.5 mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        เพิ่มประกาศงานใหม่
                    </a>


                    <button data-collapse-toggle="mega-menu-icons" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mega-menu-icons" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                <div id="mega-menu-icons" class="hidden justify-between items-center w-full lg:flex lg:w-auto lg:order-1">
                    <ul class="flex flex-col mt-4 text-sm font-medium lg:flex-row lg:space-x-8 lg:mt-0">
                        <!-- <li>
                            <a href="{{ route('job.index') }}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-600 lg:p-0 dark:text-gray-400 lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 lg:dark:hover:bg-transparent dark:border-gray-700">
                                หางานใหม่ล่าสุด
                            </a>
                        </li>


                        <li>
                            <a href="{{ route('job.by_type') }}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-600 lg:p-0 dark:text-gray-400 lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 lg:dark:hover:bg-transparent dark:border-gray-700">
                                หางานตามหมวดหมู่
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('job.by_degree') }}" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-blue-600 lg:p-0 dark:text-gray-400 lg:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue-500 lg:dark:hover:bg-transparent dark:border-gray-700">
                                หางานตามวุฒิการศึกษา
                            </a>
                        </li> -->


                        <x-header-link :href="route('job.index')" :active="request()->routeIs('job.index')">
                            หางานใหม่ล่าสุด
                        </x-header-link>
                        
                        <x-header-link :href="route('job.by_type')" :active="request()->routeIs('job.by_type*')">
                            หางานตามหมวดหมู่
                        </x-header-link>
                        
                        <x-header-link :href="route('job.by_degree')" :active="request()->routeIs('job.by_degree*')">
                            หางานตามวุฒิการศึกษา
                        </x-header-link>
                        
                    </ul>
                </div>
            </div>
        </nav>


        <div class="font-sans text-gray-900 antialiased container mx-auto">
        
            {{ $slot }}
        </div>
    </body>
</html>
