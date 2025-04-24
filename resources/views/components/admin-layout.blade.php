<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @wireUiScripts
    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased h-screen">

    <div class="flex h-screen overflow-hidden bg-gray-100">
        <div class="hidden md:flex md:flex-shrink-0">
            <div class="flex flex-col w-56">
                <div class="flex flex-col flex-grow pt-5 overflow-y-auto bg-green-600 ">
                    <div class="flex flex-col flex-shrink-0 ">
                        <a class="text-lg flex justify-center font-semibold tracking-tighter text-black focus:outline-none focus:ring"
                            href="/">
                            <span class="inline-flex items-center gap-2">
                                <img src="{{ asset('images/iclsi_logo.png') }}" class="h-12" alt="">

                                <span class="font-extrabold text-white text-3xl">ICLS</span>
                            </span>
                        </a>
                        <button class="hidden rounded-lg focus:outline-none focus:shadow-outline">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                                    clip-rule="evenodd"></path>
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="flex flex-col flex-grow  mt-5">
                        <nav class="flex-1 space-y-1  ">
                            <ul class="mt-5">
                                <li class="relative">
                                    <a class="{{ request()->routeIs('admin.dashboard') ? 'after:absolute after:right-0 after:top-0 after:h-full after:bg-active after:w-2 after:rounded-l-2xl' : ' ' }} inline-flex group items-center w-full px-8 py-1 hover:font-semibold hover:text-active mt-1 text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline   "
                                        href="{{ route('admin.dashboard') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-house">
                                            <path d="M15 21v-8a1 1 0 0 0-1-1h-4a1 1 0 0 0-1 1v8" />
                                            <path
                                                d="M3 10a2 2 0 0 1 .709-1.528l7-5.999a2 2 0 0 1 2.582 0l7 5.999A2 2 0 0 1 21 10v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                        </svg>
                                        <span class="ml-3"> Home </span>
                                    </a>
                                </li>
                            </ul>
                            <p class="px-8 pt-10 text-xs font-semibold text-gray-200 uppercase">
                                GENERAL
                            </p>
                            <ul class="space-y-2">
                                <a class="{{ request()->routeIs('admin.student') ? 'after:absolute after:right-0 after:top-0 after:h-full after:bg-active after:w-2 after:rounded-l-2xl' : ' ' }} inline-flex group items-center w-full px-8 py-1 hover:font-semibold hover:text-active mt-1 text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline   "
                                    href="{{ route('admin.student') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-users-round">
                                        <path d="M18 21a8 8 0 0 0-16 0" />
                                        <circle cx="10" cy="8" r="5" />
                                        <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                                    </svg>
                                    <span class="ml-3"> Student Info</span>
                                </a>
                                <a class="{{ request()->routeIs('admin.teacher') ? 'after:absolute after:right-0 after:top-0 after:h-full after:bg-active after:w-2 after:rounded-l-2xl' : ' ' }} inline-flex group items-center w-full px-8 py-1 hover:font-semibold hover:text-active mt-1 text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline   "
                                    href="{{ route('admin.teacher') }}" x-navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-users-round">
                                        <path d="M18 21a8 8 0 0 0-16 0" />
                                        <circle cx="10" cy="8" r="5" />
                                        <path d="M22 20c0-3.37-2-6.5-4-8a5 5 0 0 0-.45-8.3" />
                                    </svg>
                                    <span class="ml-3">Teachers</span>
                                </a>
                                <a class="{{ request()->routeIs('admin.grade_level') ? 'after:absolute after:right-0 after:top-0 after:h-full after:bg-active after:w-2 after:rounded-l-2xl' : ' ' }} inline-flex group items-center w-full px-8 py-1 hover:font-semibold hover:text-active mt-1 text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline   "
                                    href="{{ route('admin.grade_level') }}" x-navigate>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-badge">
                                        <path d="M12 22h6a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3" />
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                        <path d="M5 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path d="M7 16.5 8 22l-3-1-3 1 1-5.5" />
                                    </svg>
                                    <span class="ml-3">Grade Levels</span>
                                </a>
                                <a class="{{ request()->routeIs('admin.events') ? 'after:absolute after:right-0 after:top-0 after:h-full after:bg-active after:w-2 after:rounded-l-2xl' : ' ' }} inline-flex group items-center w-full px-8 py-1 hover:font-semibold hover:text-active mt-1 text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline   "
                                    href="{{ route('admin.events') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-calendar-days">
                                        <path d="M8 2v4" />
                                        <path d="M16 2v4" />
                                        <rect width="18" height="18" x="3" y="4" rx="2" />
                                        <path d="M3 10h18" />
                                        <path d="M8 14h.01" />
                                        <path d="M12 14h.01" />
                                        <path d="M16 14h.01" />
                                        <path d="M8 18h.01" />
                                        <path d="M12 18h.01" />
                                        <path d="M16 18h.01" />
                                    </svg>
                                    <span class="ml-3">Events</span>
                                </a>
                                {{-- <a class="{{ request()->routeIs('admin.setting') ? 'after:absolute after:right-0 after:top-0 after:h-full after:bg-active after:w-2 after:rounded-l-2xl' : ' ' }} inline-flex group items-center w-full px-8 py-1 hover:font-semibold hover:text-active mt-1 text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline   "
                                    href="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-settings">
                                        <path
                                            d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                                        <circle cx="12" cy="12" r="3" />
                                    </svg>
                                    <span class="ml-3">Settings</span>
                                </a>
                                 --}}
                                <a class="{{ request()->routeIs('admin.report') ? 'after:absolute after:right-0 after:top-0 after:h-full after:bg-active after:w-2 after:rounded-l-2xl' : ' ' }} inline-flex group items-center w-full px-8 py-1 hover:font-semibold hover:text-active mt-1 text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline   "
                                    href="{{ route('admin.report') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="lucide lucide-file-spreadsheet">
                                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                        <path d="M8 13h2" />
                                        <path d="M14 13h2" />
                                        <path d="M8 17h2" />
                                        <path d="M14 17h2" />
                                    </svg>
                                    <span class="ml-3">Reports</span>
                                </a>
                            </ul>
                            <ul class="space-y-2 pt-10">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="{{ request()->routeIs('admin.student') ? 'after:absolute after:right-0 after:top-0 after:h-full after:bg-active after:w-2 after:rounded-l-2xl' : ' ' }} inline-flex group items-center w-full px-8 py-1 hover:font-semibold hover:text-red-600 mt-1 text-white transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline   "
                                        href="route('logout')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-log-out">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                                            <polyline points="16 17 21 12 16 7" />
                                            <line x1="21" x2="9" y1="12" y2="12" />
                                        </svg>
                                        <span class="ml-3"> Logout</span>
                                    </a>
                                </form>

                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col flex-1 w-0 overflow-hidden">
            <main class="relative flex-1 overflow-y-auto focus:outline-none">
                {{-- <div class="border-b bg-white top-0 sticky  z-10 ">
                    <div class="mx-auto px-10 py-3  pt-4 flex justify-between items-center">
                        <div>
                            <h1 class="text-2xl font-semibold text-gray-800">@yield('title')</h1>
                        </div>
                        <div>
                            <div x-data="{
                                dropdownOpen: false
                            }" class="relative">

                                <button @click="dropdownOpen=true"
                                    class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white rounded-md text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                                    <img src="{{ asset('images/default.jpg') }}"
                                        class="object-cover w-12 h-12 border rounded-full border-neutral-200" />
                                    <span
                                        class="flex flex-col items-start  flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                                        <span>{{ auth()->user()->name }}</span>
                                        <span
                                            class="text-sm font-light text-neutral-400">{{ auth()->user()->email }}</span>
                                    </span>
                                    <svg class="absolute right-0 w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                </button>

                                <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
                                    x-transition:enter="ease-out duration-200"
                                    x-transition:enter-start="-translate-y-2" x-transition:enter-end="translate-y-0"
                                    class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
                                    <div
                                        class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                                        <div class="px-2 py-1.5 text-sm font-semibold">My Account</div>
                                        <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                        <a href="#_"
                                            class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-4 h-4 mr-2">
                                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="12" cy="7" r="4"></circle>
                                            </svg>
                                            <span>Profile</span>
                                            <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘P</span>
                                        </a>

                                        <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                                        <a href="#_"
                                            class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="w-4 h-4 mr-2">
                                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                                <polyline points="16 17 21 12 16 7"></polyline>
                                                <line x1="21" x2="9" y1="12" y2="12">
                                                </line>
                                            </svg>
                                            <span>Log out</span>
                                            <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘Q</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
                <div class="relative">
                    <div class="mr-96 p-10">
                        <h1 class="text-3xl font-semibold text-gray-800">@yield('title')</h1>
                        <div class="mt-10">
                            {{ $slot }}
                        </div>
                    </div>

                    <div class="fixed top-[2rem] right-5 w-96 bottom-[2rem] rounded-[2rem] bg-green-600">
                        {{ $sidebar ?? '' }}
                    </div>
                </div>

            </main>
        </div>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
