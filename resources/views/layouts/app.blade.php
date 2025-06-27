<!-- The place where head file, header and footer -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Manager</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script>
        tailwind.config = {
            important: true,
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
</head>

<body>
    <!-- Header -->
    <header class="border-b border-gray-200 py-3">
        <div class="container mx-auto max-w-7xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-8">
                    <a href="{{ route('welcome') }}" class="flex items-center space-x-2 no-underline">
                        <div class="flex items-center space-x-2">
                            <div class="w-8 h-8"><img src="/assets/ResumeManager_black.png" alt="resume logo"></div>
                            <span class=" text-transparent bg-[linear-gradient(to_right,_#008baa,_#7e42a7,_#6600c5,_#6070fd,_#2a46ff,_#0099ff,_#008ead)] bg-clip-text font-semibold text-xl ">Resume Manager</span>
                        </div>
                    </a>
                    <nav class="hidden md:flex items-center space-x-6">
                        <a href="{{ route('welcome') }}" class="relative text-gray-600 hover:text-blue-800 text-sm no-underline after:absolute after:left-0 after:-bottom-0.5 after:h-[1.5px] after:w-0 after:bg-blue-800 after:transition-all after:duration-300 hover:after:w-full font-medium">Home</a>
                        <a href="{{ route(name:'talent_search') }}" class="relative text-gray-600 hover:text-blue-800 text-sm no-underline after:absolute after:left-0 after:-bottom-0.5 after:h-[1.5px] after:w-0 after:bg-blue-800 after:transition-all after:duration-300 hover:after:w-full font-medium">Talent Search</a>
                        <a href="{{ route(name:'FAQ') }}" class="relative text-gray-600 hover:text-blue-800 text-sm no-underline after:absolute after:left-0 after:-bottom-0.5 after:h-[1.5px] after:w-0 after:bg-blue-800 after:transition-all after:duration-300 hover:after:w-full font-medium">FAQ</a>
                        <!-- <div class="flex items-center space-x-1">
                            <a href="#" class="relative text-gray-600 hover:text-blue-800 text-sm no-underline after:absolute after:left-0 after:-bottom-0.5 after:h-[1.5px] after:w-0 after:bg-blue-800 after:transition-all after:duration-300 hover:after:w-full font-medium">Sixteen</a>
                            <i class="fas fa-chevron-down text-gray-600 text-xs"></i>
                        </div> -->
                    </nav>
                </div>
                <div class="flex items-center space-x-3">
                    @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                        <div class="relative"> {{-- Added a wrapper div for positioning the popup --}}
                            <a class="no-underline relative" id="profileLink">
                                <div class="relative">
                                    @if(Auth::user()?->resume?->profile_pic)
                                    <img class="h-12 w-12 rounded-full border-4 border-white shadow-lg object-cover"
                                        src="{{ asset(Auth::user()->resume->profile_pic)}}"
                                        alt="Profile Picture">
                                    @else
                                    <i class="bx bx-user h-12 w-12 rounded-full border-4 border-white shadow-lg text-gray-400 flex items-center justify-center text-2xl"></i>
                                    @endif
                                </div>
                            </a>

                            {{-- Profile Popup --}}
                            <!-- Slide-in Sidebar -->
                            <div id="profilePopup" class=" hidden absolute bg-white shadow-lg rounded-md border mt-2 w-48 right-0 z-50 p-4 space-y-3"
                                style="top: 3rem;"> <!-- Adjust top value to position below the icon -->
                                <a href="{{ route('dashboard.show', Auth::user()->id) }}" class="no-underline block px-3 py-2 text-gray-700 hover:bg-gray-100 rounded">View Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-3 py-2 text-gray-700 hover:bg-gray-100 rounded">
                                        Logout
                                    </button>
                                </form>
                            </div>

                        </div>
                        @else
                        <a
                            href="{{ route('login') }}">
                            <button class="text-blue-600 hover:text-blue-700 px-4 py-2 rounded-md font-medium text-sm no-underline">
                                Log In</button>
                        </a>

                        @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium text-sm no-underline">
                            Register</button>
                        </a>
                        @endif
                        @endauth
                    </nav>
                    @endif
                </div>
            </div>
        </div>


    </header>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-6">
                        <div class="w-8 h-8"><img src="/assets/ResumeManager_white.png" alt="resume logo"></div>
                        <span class="font-semibold text-lg">Resume Manager</span>
                    </div>
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-2 sm:space-y-0 sm:space-x-2">
                        <input
                            type="email"
                            placeholder="Enter your email to get the latest news..."
                            class="bg-gray-700 border border-gray-600 text-white placeholder-gray-400 px-4 py-2 rounded-md text-sm flex-1" />
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            Subscribe
                        </button>
                    </div>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Content</h4>
                    <ul class="space-y-2 text-gray-300 text-sm hover:text-white no-underline list-none ml-5 p-0">
                        <li><a href="{{ route('welcome') }}" class="text-gray-400 hover:text-white no-underline font-semibold">Home</a></li>
                        <li><a href="{{ route(name:'talent_search') }}" class="text-gray-400 hover:text-white no-underline font-semibold">Talent Search</a></li>
                        <li><a href="{{ route(name:'FAQ') }}" class="text-gray-400 hover:text-white no-underline font-semibold">FAQ</a></li>
                    </ul>
                </div>

                <div>

                    <div>
                        <h5 class="font-medium mb-2">Join Us</h5>
                        <div class="flex space-x-3 ">
                            <a href="#" class="text-gray-400 hover:text-white">
                                <i class="bx bxl-facebook text-4xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white font-semibold">
                                <i class="bx bxl-instagram text-4xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white">
                                <i class="bx bxl-youtube text-4xl"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white">
                                <i class="bx bxl-linkedin-square text-4xl"></i>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-700 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">Copyright © Misty 2025. All rights reserved.</p>
            </div>
    </footer>
</body>

</html>