<x-app-layout>
    @section('content')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>


        <div class="min-h-screen bg-gray-50 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                    <!-- Left Sidebar - Profile Section -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <!-- Background Header -->
                            <div class="h-32 bg-gradient-to-r from-blue-500 to-purple-600 relative">
                                @if(Auth::id() == $id)
                                    <button class="absolute top-4 right-4 text-white hover:text-gray-200 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                            </path>
                                        </svg>
                                    </button>
                                @endif
                            </div>

                            <!-- Profile Picture -->
                            <div class="relative px-6 pb-6">
                                <div class="flex justify-center -mt-16">
                                    <div class="relative">
                                        <img class="h-32 w-32 rounded-full border-4 border-white shadow-lg object-cover"
                                            src="{{ $user->profile_picture ?? 'https://via.placeholder.com/128x128?text=User' }}"
                                            alt="Profile Picture">

                                        @if(Auth::id() == $id)
                                            <button
                                                class="absolute bottom-2 right-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 shadow-lg transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </div>

                                <!-- User Info -->
                                <div class="mt-6 text-center">
                                    <h2 class="text-2xl font-bold text-gray-900">{{ $user->name ?? 'John Doe' }}</h2>
                                    <p class="text-gray-600 mt-1">{{ $user->job_title ?? 'Professional Title' }}</p>
                                </div>

                                <!-- Contact Information -->
                                <div class="mt-6 space-y-4">
                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span
                                            class="text-sm">{{ $user->address ?? '123 Main St, City, State 12345' }}</span>
                                    </div>

                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                        <span class="text-sm">{{ $user->phone ?? '+1 (555) 123-4567' }}</span>
                                    </div>

                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="text-sm">{{ $user->email ?? 'john.doe@example.com' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content Area -->
                    <div class="lg:col-span-2">
                        <div class="space-y-6">

                            <!-- About Section -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-xl font-semibold text-gray-900">About</h3>
                                    @if(Auth::id() == $id)
                                        <button class="text-blue-500 hover:text-blue-700 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                                <p class="text-gray-600 leading-relaxed">
                                    {{ $user->about ?? 'Passionate professional with extensive experience in delivering high-quality solutions. Committed to continuous learning and innovation in the field. Strong collaborative skills and proven track record of success in challenging environments.' }}
                                </p>
                            </div>

                            <!-- Work Experience Section -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-xl font-semibold text-gray-900">Work Experience</h3>
                                    @if(Auth::id() == $id)
                                        <button class="text-blue-500 hover:text-blue-700 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>

                                @if(isset($workExperiences) && count($workExperiences) > 0)
                                    @foreach($workExperiences as $experience)
                                        <div class="border-l-4 border-blue-500 pl-4 mb-6 last:mb-0">
                                            <div class="flex justify-between items-start mb-2">
                                                <h4 class="text-lg font-medium text-gray-900">{{ $experience->position }}</h4>
                                                <span class="text-sm text-gray-500">{{ $experience->start_date }} -
                                                    {{ $experience->end_date ?? 'Present' }}</span>
                                            </div>
                                            <p class="text-blue-600 font-medium mb-2">{{ $experience->company }}</p>
                                            <p class="text-gray-600">{{ $experience->description }}</p>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="border-l-4 border-blue-500 pl-4 mb-6">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-lg font-medium text-gray-900">Senior Software Developer</h4>
                                            <span class="text-sm text-gray-500">2022 - Present</span>
                                        </div>
                                        <p class="text-blue-600 font-medium mb-2">Tech Solutions Inc.</p>
                                        <p class="text-gray-600">Lead development of web applications using modern frameworks.
                                            Collaborate with cross-functional teams to deliver scalable solutions.</p>
                                    </div>

                                    <div class="border-l-4 border-blue-500 pl-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-lg font-medium text-gray-900">Full Stack Developer</h4>
                                            <span class="text-sm text-gray-500">2020 - 2022</span>
                                        </div>
                                        <p class="text-blue-600 font-medium mb-2">Digital Agency Co.</p>
                                        <p class="text-gray-600">Developed and maintained client websites and applications.
                                            Implemented responsive designs and optimized performance.</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Education Section -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-xl font-semibold text-gray-900">Education</h3>
                                    @if(Auth::id() == $id)
                                        <button class="text-blue-500 hover:text-blue-700 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>

                                @if(isset($educations) && count($educations) > 0)
                                    @foreach($educations as $education)
                                        <div class="border-l-4 border-green-500 pl-4 mb-6 last:mb-0">
                                            <div class="flex justify-between items-start mb-2">
                                                <h4 class="text-lg font-medium text-gray-900">{{ $education->degree }}</h4>
                                                <span class="text-sm text-gray-500">{{ $education->graduation_year }}</span>
                                            </div>
                                            <p class="text-green-600 font-medium mb-2">{{ $education->institution }}</p>
                                            @if($education->gpa)
                                                <p class="text-gray-600">GPA: {{ $education->gpa }}</p>
                                            @endif
                                        </div>
                                    @endforeach
                                @else
                                    <div class="border-l-4 border-green-500 pl-4 mb-6">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-lg font-medium text-gray-900">Bachelor of Science in Computer
                                                Science</h4>
                                            <span class="text-sm text-gray-500">2020</span>
                                        </div>
                                        <p class="text-green-600 font-medium mb-2">University of Technology</p>
                                        <p class="text-gray-600">GPA: 3.8/4.0</p>
                                    </div>

                                    <div class="border-l-4 border-green-500 pl-4">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-lg font-medium text-gray-900">High School Diploma</h4>
                                            <span class="text-sm text-gray-500">2016</span>
                                        </div>
                                        <p class="text-green-600 font-medium">Central High School</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Resume Upload Section -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">Resume Upload</h3>

                                @if(isset($user->resume_file))
                                    <div
                                        class="flex items-center justify-between p-4 bg-green-50 border border-green-200 rounded-lg mb-4">
                                        <div class="flex items-center">
                                            <svg class="w-8 h-8 text-red-500 mr-3" fill="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                                            </svg>
                                            <div>
                                                <p class="text-sm font-medium text-green-800">{{ basename($user->resume_file) }}
                                                </p>
                                                <p class="text-xs text-green-600">Uploaded on
                                                    {{ $user->resume_uploaded_at ?? 'Unknown date' }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex space-x-2">
                                            <a href="{{ asset('storage/' . $user->resume_file) }}" target="_blank"
                                                class="text-blue-500 hover:text-blue-700 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                                    </path>
                                                </svg>
                                            </a>
                                            @if(Auth::id() == $id)
                                                <button class="text-red-500 hover:text-red-700 transition-colors">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- <script>
                                    function updateFileName(input) {
                                        const fileName = document.getElementById('fileName');
                                        if (input.files && input.files[0]) {
                                            fileName.textContent = 'Selected: ' + input.files[0].name;
                                            fileName.classList.remove('hidden');
                                        } else {
                                            fileName.classList.add('hidden');
                                        }
                                    }
                                    </script> -->
    @endsection
</x-app-layout>