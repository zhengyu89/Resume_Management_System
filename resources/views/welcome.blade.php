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
                <a href="https://rxresu.me/" target="_blank" class="no-underline bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-md font-medium">
                    Build Resume
                </a>
                <a href="{{ route(name:'talent_search') }}" class="no-underline border border-blue-600 text-blue-600 hover:bg-blue-50 px-8 py-3 rounded-md font-medium">
                    Find Talent
                </a>
            </div>

            <!-- Embedded Video -->
            <div class="max-w-2xl mx-auto aspect-w-16 aspect-h-9">
                <iframe class="w-full h-64 md:h-96 rounded-lg shadow-lg"
                        src="https://www.youtube.com/embed/r-4uzk7RhcY"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <!-- Numbers That Matter Section -->
<section class="py-16 px-4 bg-gray-50">
    <div class="container mx-auto max-w-6xl">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-4">Numbers That Matter</h2>
        <p class="text-gray-600 text-center mb-12 max-w-4xl mx-auto">
            We're proud to support thousands of students and professionals with the tools they need to build standout resumes and find great jobs. Here's a quick look at what we've achieved together.
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-blue-600 text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900 mb-2">1,200+</div>
                <div class="text-gray-600 text-sm">Happy Users</div>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-file-alt text-blue-600 text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900 mb-2">3,500+</div>
                <div class="text-gray-600 text-sm">Resumes Created</div>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-briefcase text-blue-600 text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900 mb-2">900+</div>
                <div class="text-gray-600 text-sm">Jobs Matched</div>
            </div>

            <div class="text-center">
                <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-building text-blue-600 text-2xl"></i>
                </div>
                <div class="text-3xl font-bold text-gray-900 mb-2">50+</div>
                <div class="text-gray-600 text-sm">Recruiters</div>
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
                        Their resume manager tool saved us hours every week. The interface is clean and super user-friendly.
                    </p>
                    <div class="text-sm text-gray-500">
                        <div class="font-medium">Nur Aisyah Binti Mohd Faris</div>
                        <div>Talent Acquisition Specialist</div>
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
                        We use this platform to find creative talents. It’s reliable and fast.
                    </p>
                    <div class="text-sm text-gray-500">
                        <div class="font-medium">Muhammad Hakim Bin Roslan</div>
                        <div>Senior Software Engineer</div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                            <span class="text-white font-bold text-sm">H</span>
                        </div>
                        <div class="font-semibold">HireRight</div>
                    </div>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        The Resume Manager streamlined our recruitment process. We found top talents faster than ever.
                    </p>
                    <div class="text-sm text-gray-500">
                        <div class="font-medium">Sarah Tan</div>
                        <div>HR Executive</div>
                    </div>
                </div>
                <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
    <div class="flex items-center mb-4">
        <div class="w-10 h-10 bg-indigo-600 rounded-full flex items-center justify-center mr-3">
            <span class="text-white font-bold text-sm">C</span>
        </div>
        <div class="font-semibold">CareerBoost</div>
    </div>
    <p class="text-gray-600 mb-4 leading-relaxed">
        Resume Manager transformed the way we connect with tech talent. The platform is smooth, modern, and super intuitive.
    </p>
    <div class="text-sm text-gray-500">
        <div class="font-medium">Amanda Loh</div>
        <div>Partnership Manager</div>
    </div>
</div>

            </div>
        </div>
    </section>
    <!-- Success Stories Section -->
<section class="py-16 px-4 bg-gray-50">
    <div class="container mx-auto max-w-6xl">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Success Stories</h2>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-blue-50 border border-blue-100 rounded-lg p-6 shadow-sm">
                <p class="text-gray-700 mb-4 leading-relaxed">
                    “Using Resume Manager, I got 3 interview calls within a week. The resume builder made everything so easy.”
                </p>
                <div class="text-sm text-gray-600">
                    <div class="font-medium">Amira Binti Hasyim</div>
                    <div>Marketing Graduate, Johor</div>
                </div>
            </div>

            <div class="bg-blue-50 border border-blue-100 rounded-lg p-6 shadow-sm">
                <p class="text-gray-700 mb-4 leading-relaxed">
                    “The platform helped me find a freelance UI designer within 2 days. Super smooth experience!”
                </p>
                <div class="text-sm text-gray-600">
                    <div class="font-medium">Lim Yi Sheng</div>
                    <div>Startup Founder, Selangor</div>
                </div>
            </div>

            <div class="bg-blue-50 border border-blue-100 rounded-lg p-6 shadow-sm">
                <p class="text-gray-700 mb-4 leading-relaxed">
                    “I love how professional my resume looked. I finally got hired by a tech company I admire.”
                </p>
                <div class="text-sm text-gray-600">
                    <div class="font-medium">Farhan Hakim</div>
                    <div>Junior Developer, Kuala Lumpur</div>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Team Section -->
    <section class="py-16 px-4 bg-white-50">
        <div class="container mx-auto max-w-6xl">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Our Lovely Team</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @php
                    $teamMembers = [
                        ['name' => 'Tan Zheng Yu', 'role' => 'Full Stack Developer', 'email' => 'tanzhengyu@graduate.utm.my', 'image' => 'assets/TanZhengYu.jpeg'],
                        ['name' => 'Teow Zi Xian', 'role' => 'Backend Developer', 'email' => 'teow@graduate.utm.my', 'image' => 'assets/TeowZiXian.jpg'],
                        ['name' => 'Tan Zhen Li', 'role' => 'Frontend Developer', 'email' => 'tan.li@graduate.utm.my', 'image' => 'assets/Zhenli.jpg'],
                        ['name' => 'Benjamin Chew', 'role' => 'Database Administrator', 'email' => 'jun00@graduate.utm.my', 'image' => 'assets/Benjamin.jpg'],
                    ];
                @endphp

                @foreach($teamMembers as $member)
                <div class="text-center">
                    <img src="{{ asset($member['image']) }}" alt="{{ $member['name'] }}" class="w-32 h-32 object-cover rounded-lg mx-auto mb-4">
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
                    <a href="mailto:{{ $member['email'] }}?subject=Contact from Resume Manager" 
                       class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-md text-xs font-medium">
                        Contact {{ explode(' ', $member['name'])[0] }}
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


</body>
</html>