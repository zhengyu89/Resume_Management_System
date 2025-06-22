<x-app-layout>
    @section('content')
        {{-- Show alert when first log in --}}
        <div>
            @if (session('just_logged_in'))
                <x-alert>
                    Welcome to Resume Manager ☺️☺️☺️
                </x-alert>
            @endif
        </div>

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
                                        @if($user?->resume?->profile_pic)
                                            <img class="h-32 w-32 rounded-full border-4 border-white shadow-lg object-cover"
                                                src="{{ asset($user->resume->profile_pic)}}" alt="Profile Picture">
                                        @else
                                            {{-- Later change to default.jpg --}}
                                            <i
                                                class="bx bx-user h-12 w-12 rounded-full border-4 border-white shadow-lg text-gray-400 flex items-center justify-center text-2xl"></i>
                                        @endif

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
                                    <h2 class="text-2xl font-bold text-gray-900">{{ $user->name ?? 'Unknown User' }}</h2>
                                    <p class="text-gray-600 mt-1">{{ $user->resume->title ?? '' }}</p>
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
                                        <span class="text-sm">{{ $user->resume->address ?? '' }}</span>
                                    </div>

                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                        <span class="text-sm">{{ $user->resume->phone_number ?? '' }}</span>
                                    </div>

                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="text-sm">{{ $user->email ?? 'Unknown Email' }}</span>
                                    </div>

                                    {{-- Edit and Delete button --}}
                                    @if(Auth::id() == $id)
                                        <div class="mt-6 border-t pt-6 text-center">
                                            {{-- Using a grid for equal columns --}}
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 justify-items-center"> {{-- Note:
                                                justify-items-center to center content in grid cells --}}
                                                {{-- Edit Profile Button --}}
                                                <a href=""
                                                    class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                    Edit Profile
                                                </a>

                                                {{-- Delete Account Button --}}
                                                <a href=""
                                                    class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                                                    onclick="event.preventDefault(); confirmDeleteAccount();">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                    Delete Account
                                                </a>
                                                <form id="delete-account-form" method="POST"
                                                    action="" class="hidden">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    @endif
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
                                    {{ $user->resume->about ?? '' }}
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
                                @foreach($user->resume?->workExperiences as $experience)
                                    <div class="border-l-4 border-blue-500 pl-4 mb-6 last:mb-0">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-lg font-medium text-gray-900">{{ $experience->position }}</h4>
                                            <span class="text-sm text-gray-500">{{ $experience->date_end->format('F Y') }} -
                                                {{ $experience->date_end ? $experience->date_end->format('F Y') : 'Present' }}</span>
                                        </div>
                                        <p class="text-blue-600 font-medium mb-2">{{ $experience->company_name }}</p>
                                        <p class="text-gray-600">{{ $experience->description }}</p>
                                    </div>
                                @endforeach
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

                                @foreach($user->resume->educations as $education)
                                    <div class="border-l-4 border-green-500 pl-4 mb-6 last:mb-0">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-lg font-medium text-gray-900">{{ $education->studyField->name }}
                                            </h4>
                                            <span class="text-sm text-gray-500">{{ $education->date_end->format('F Y') }} -
                                                {{ $experience->date_end ? $experience->date_end->format('F Y') : 'Present' }}</span>
                                        </div>
                                        <p class="text-green-600 font-medium mb-2">{{ $education->school_name }}</p>
                                        @if($education->gpa)
                                            <p class="text-gray-600">GPA: {{ $education->gpa }}</p>
                                        @endif
                                    </div>
                                @endforeach

                            </div>

                            <!-- Uploaded Section -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-xl font-semibold text-gray-900">Resume</h3>
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

                                @foreach($user->resume->documents as $documents)
                                    <div class="border-l-4 border-orange-500 pl-4 mb-6 last:mb-0">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-lg font-medium text-gray-900">{{ basename($documents->file_path) }}
                                            </h4>

                                        </div>
                                        <div class="flex gap-5">
                                            <p class="underline text-blue-500 font-medium mb-2 flex"><a
                                                    href="{{ asset($documents->file_path) }}">Preview</a></p>
                                            <p class="underline text-blue-500 font-medium mb-2 flex"><a
                                                    href="{{ asset($documents->file_path) }}"
                                                    download="{{ basename($documents->file_path) }}">Download</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
        </div>
    @endsection

</x-app-layout>