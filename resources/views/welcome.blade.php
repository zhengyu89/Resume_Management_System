<!DOCTYPE html>
<html lang="en">
    
@extends ('layouts.app')

<body class="font-sans bg-white text-gray-900">
@section('content')
    <!-- Hero Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto max-w-6xl text-center">
            <h1 class="text-5xl md:text-5xl font-bold text-gray-900 mb-4 max-w-4xl mx-auto leading-tight">
                Resume Manager<br>
                Your All In One Job Platform
            </h1>
            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-md font-medium">
                    Primary Action
                </button>
                <button class="border border-blue-600 text-blue-600 hover:bg-blue-50 px-8 py-3 rounded-md font-medium">
                    Secondary Action
                </button>
            </div>

            <!-- Video Player Mockup -->
            <div class="max-w-2xl mx-auto">
                <div class="bg-gray-100 rounded-lg p-8 relative">
                    <div class="bg-white rounded-lg shadow-lg p-8 relative">
                        <div class="w-16 h-16 bg-gray-200 rounded-full flex items-center justify-center mx-auto">
                            <i class="fas fa-play text-gray-500 text-xl"></i>
                        </div>
                    </div>
                    <div class="absolute top-4 left-4 flex space-x-1">
                        <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                        <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                        <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                    </div>
                    <div class="absolute top-4 right-4">
                        <div class="w-6 h-6 bg-gray-300 rounded flex items-center justify-center text-gray-600 text-xs">
                            ×
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Numbers Section -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="container mx-auto max-w-6xl">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-4">Numbers That Matter</h2>
            <p class="text-gray-600 text-center mb-12 max-w-4xl mx-auto">
                Rhoncus morbi et augue nec, in id ullamcorper at sit. Condimentum sit nunc in eros scelerisque sed. Commodo
                in viverra nunc, ullamcorper ut. Non amet, tempor scelerisque molestie tellus. Fermentum scelerisque sit
                amet mauris commodo ac rhoncus. Eu non diam sit viverra lorem. Ut vulputate cursus sit mauris. Mollis leo
                eleifend ultricies purus iaculis.
            </p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded"></div>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">250+</div>
                    <div class="text-gray-600 text-sm">Happy Customers</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded"></div>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">600+</div>
                    <div class="text-gray-600 text-sm">Completed Projects</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded"></div>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">1.8K+</div>
                    <div class="text-gray-600 text-sm">Available Resources</div>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                        <div class="w-8 h-8 bg-blue-600 rounded"></div>
                    </div>
                    <div class="text-3xl font-bold text-gray-900 mb-2">11K+</div>
                    <div class="text-gray-600 text-sm">Subscribers</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto max-w-6xl">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">What Our Partners Say</h2>

            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-sm">Z</span>
                        </div>
                        <div class="font-semibold">Zoommer</div>
                    </div>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Maecenas facilisi libero nam eu. Quis pellentesque tortor a elementum ut blandit sed pellentesque
                        arcu. Maecenas in faucibus risus vitae diam. Non, massa sit a arcu, fermentum sit cursus ut eleifend.
                    </p>
                    <div class="text-sm text-gray-500">
                        <div class="font-medium">Author Name</div>
                        <div>Role</div>
                    </div>
                </div>

                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-sm">A</span>
                        </div>
                        <div class="font-semibold">ArtVenue</div>
                    </div>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        Nisl risus viverra dignissim eget. Nulla imperdiet integer vitae consequat adipiscing pellentesque.
                        Sed amet tincidunt morbi non sed donec mollis placerat neque.
                    </p>
                    <div class="text-sm text-gray-500">
                        <div class="font-medium">Author Name</div>
                        <div>Role</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-16 px-4 bg-gray-50">
        <div class="container mx-auto max-w-6xl">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Our Lovely Team</h2>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @php
                    $teamMembers = [
                        ['name' => 'Darrell Steward', 'role' => 'UI Designer & Co-Founder'],
                        ['name' => 'Savannah Nguyen', 'role' => 'UX Designer & Co-Founder'],
                        ['name' => 'Dianne Russell', 'role' => 'Developer'],
                        ['name' => 'Kristin Watson', 'role' => 'Product Designer']
                    ];
                @endphp

                @foreach($teamMembers as $member)
                <div class="text-center">
                    <div class="w-32 h-32 bg-gray-300 rounded-lg mx-auto mb-4"></div>
                    <h3 class="font-semibold text-gray-900 mb-1">{{ $member['name'] }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ $member['role'] }}</p>
                    <div class="flex justify-center space-x-3 mb-4">
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-linkedin text-sm"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-gray-600">
                            <i class="fab fa-facebook text-sm"></i>
                        </a>
                    </div>
                    <button class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-md text-xs font-medium">
                        Contact {{ explode(' ', $member['name'])[0] }}
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- App Download Section -->
    <section class="py-16 px-4">
        <div class="container mx-auto max-w-6xl">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="flex justify-center">
                    <div class="w-64 h-96 bg-gray-200 rounded-3xl flex items-center justify-center">
                        <i class="fas fa-mobile-alt text-gray-400 text-6xl"></i>
                    </div>
                </div>
                <div class="text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Download The App</h2>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Nam rhoncus viverra eget faucibus pellentesque. Feugiat adipiscing massa vitae auctor eu massa. Sodales
                        libero orci cursus sed lorem nulla. In malesuada sagittis, egestas viverra ac nam. Massa volutpat.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center ">
                        <button class="bg-black text-white flex items-center justify-center space-x-2 px-6 py-3 rounded-md font-medium">
                            <i class="fab fa-apple text-lg"></i>
                            <span>App Store</span>
                        </button>
                        <button class="bg-black text-white flex items-center justify-center space-x-2 px-6 py-3 rounded-md font-medium">
                            <i class="fab fa-google-play text-lg"></i>
                            <span>Google Play</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
