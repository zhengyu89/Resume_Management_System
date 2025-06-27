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
                            <div class="h-32 relative">
                                <img class="absolute inset-0 object-cover w-full h-full"
                                    src="{{ asset($user->resume->cover_pic ?? 'assets/cover_pics/default.jpg') }}" alt="Cover Picture">
                                @if(Auth::id() == $id)
                                <!-- Cover Picture Upload -->
                                <form method="POST" action="{{ route('dashboard.resume.update', $user->resume) }}" enctype="multipart/form-data" class="absolute top-4 right-4">
                                    @csrf
                                    @method('PUT')
                                    <label class="text-white hover:text-gray-200 transition-colors cursor-pointer">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                            </path>
                                        </svg>
                                        <input type="file" name="cover_pic" accept="image/*" onchange="this.form.submit()" class="hidden">
                                    </label>
                                </form>
                                @endif
                            </div>

                            <!-- Profile Picture -->
                            <div class="relative px-6 pb-6">
                                <div class="flex justify-center -mt-16">
                                    <div class="relative">
                                        <img class="h-32 w-32 rounded-full border-4 border-white shadow-lg object-cover"
                                            src="{{ asset($user->resume->profile_pic ?? 'assets/profile_pics/default.jpg') }}" alt="Profile Picture">

                                        @if(Auth::id() == $id)
                                        <!-- Profile Picture Upload -->
                                        <form method="POST" action="{{ route('dashboard.resume.update', $user->resume) }}" enctype="multipart/form-data" class="absolute bottom-2 right-2">
                                            @csrf
                                            @method('PUT')
                                            <label class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-2 shadow-lg cursor-pointer">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg>
                                                <input type="file" name="profile_pic" accept="image/*" onchange="this.form.submit()" class="hidden">
                                            </label>
                                        </form>
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
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="text-sm">{{ $user->resume->address ?? '' }}</span>
                                    </div>

                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                            </path>
                                        </svg>
                                        <span class="text-sm">{{ $user->resume->phone_number ?? '' }}</span>
                                    </div>

                                    <div class="flex items-center text-gray-600">
                                        <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span class="text-sm">{{ $user->email ?? 'Unknown Email' }}</span>
                                    </div>

                                    <!-- Edit & Delete Buttons -->
                                    @if(Auth::id() == $id)
                                    <div class="mt-6 border-t pt-6 text-center">
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 justify-items-center">
                                            <!-- Edit Profile btn -->
                                            <button type="button" onclick="openProfileModal()"
                                                class="inline-flex items-center justify-center w-full px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                    </path>
                                                </svg>
                                                Edit Profile
                                            </button>
                                            <!-- Delete Account btn -->
                                            <button onclick="document.getElementById('delete-account-modal').classList.remove('hidden')"
                                                class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                                Delete Account
                                            </button>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- Profile Edit Modal -->
                                    <div id="profile-edit-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                        <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
                                            <button onclick="closeProfileModal()" class="absolute top-4 right-4 text-gray-500 hover:text-red-600 text-2xl font-bold focus:outline-none">&times;</button>
                                            <h2 class="text-lg font-semibold mb-4">Edit Profile</h2>
                                            @include('profile._edit_form')
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Account Confirmation Modal -->
                    <div id="delete-account-modal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
                        <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm">
                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
                            <p class="text-gray-600 mb-6">Are you sure you want to delete your account? This action cannot be undone.</p>

                            <div class="flex justify-between">
                                <button type="button"
                                    onclick="document.getElementById('delete-account-modal').classList.add('hidden')"
                                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                                    Cancel
                                </button>
                                <form method="POST" action="{{ route('dashboard.destroy') }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                        Confirm Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content Area -->
                    <div class="lg:col-span-2">
                        <div class="space-y-6">

                            <!-- About Section -->
                            <div x-data="aboutEditor('{{ addslashes($user->resume->about ?? '') }}')" class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-xl font-semibold text-gray-900">About</h3>
                                    <!-- Edit Button (hidden if not authorized user) -->
                                    @if(Auth::id() == $id)
                                        <button @click="toggleEdit()" class="text-blue-500 hover:text-blue-700 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                                <!-- Display about content -->
                                <p x-show="!editMode" class="text-gray-600 leading-relaxed">
                                    <span x-text="originalText"></span>
                                </p>
                                <!-- Edit About Content -->
                                @if(Auth::id() == $id)
                                    <form x-show="editMode" x-cloak method="POST" action="{{ route('dashboard.resume.update', $user->resume->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <textarea x-model="editableText" name="about" class="w-full border rounded p-2 text-sm" rows="4" placeholder="Write something about yourself..."></textarea>
                                        <div class="mt-2 flex space-x-2">
                                            <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700 text-sm">
                                                Save
                                            </button>
                                            <button type="button" @click="cancelEdit()" class="bg-gray-300 text-gray-700 px-4 py-1 rounded hover:bg-gray-400 text-sm">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                @endif
                            </div>

                            <!-- Work Experience Section -->
                            <div id="work-experience-section" class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-xl font-semibold text-gray-900">Work Experience</h3>
                                    @if(Auth::id() == $id)
                                        <div class="flex item-center space-x-2">
                                            <!-- Add btn -->
                                            <button onclick="openWorkExperienceModal('create')" class="text-green-600 hover:text-green-800 transition-colors" title="Add Work Experience">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                            </button>
                                            <!-- Edit btn -->
                                            <button onclick="toggleWorkExperienceEdit()" class="text-blue-500 hover:text-blue-700 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                @foreach($user->resume->workExperiences as $experience)
                                    <div class="border-l-4 border-blue-500 pl-4 mb-6 last:mb-0">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-lg font-medium text-gray-900">{{ $experience->position }}</h4>
                                            <!-- Edit Icon (Only shows in editing mode) -->
                                            @if(Auth::id() == $id)
                                            <div class="mt-2 text-right">
                                                <button onclick="openWorkExperienceModal({{ $experience->id }})" class="work-edit-btn hidden text-blue-500 hover:text-blue-700">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536M16.732 3.732a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                        <p class="text-yellow-600 font-medium mb-2">{{ $experience->company_name }}</p>
                                        <p class="text-sm text-gray-500">
                                            {{ $experience->date_start ? $experience->date_start->format('F Y') : 'Unknown'}} -
                                            {{ $experience->date_end ? $experience->date_end->format('F Y') : 'Present' }}
                                        </p>
                                        @if($experience->description)
                                            <p class="text-gray-600 mt-2">{{ $experience->description }}</p>
                                        @endif
                                        
                                        <!-- Edit Modal -->
                                        <div id="modal-workExperience-{{ $experience->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                            <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
                                                <button onclick="closeWorkExperienceModal({{ $experience->id }})" class="absolute top-4 right-4 text-gray-500 hover:text-red-600 text-2xl font-bold focus:outline-none">&times;</button>
                                                <h2 class="text-lg font-semibold mb-4">Edit Work Experience</h2>
                                                @include('workExperiences._edit_form', ['experience' => $experience])
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                @if(Auth::id() == $id)
                                <!-- Create Modal -->
                                <div id="modal-workExperience-create" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                    <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
                                        <button onclick="closeWorkExperienceModal('create')" class="absolute top-4 right-4 text-gray-500 hover:text-red-600 text-2xl font-bold focus:outline-none">&times;</button>
                                        <h2 class="text-lg font-semibold mb-4">Add Work Experience</h2>
                                        @include('workExperiences._create_form')
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Education Section -->
                            <div id="education-section" class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-xl font-semibold text-gray-900">Education</h3>
                                    @if(Auth::id() == $id)
                                        <div class="flex item-center space-x-2">
                                            <!-- Add btn -->
                                            <button onclick="openEducationModal('create')" class="text-green-600 hover:text-green-800 transition-colors" title="Add Education">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 4v16m8-8H4" />
                                                </svg>
                                            </button>
                                            <!-- Edit btn -->
                                            <button onclick="toggleEducationEdit()" class="text-blue-500 hover:text-blue-700 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    @endif
                                </div>

                                @foreach($user->resume->educations as $education)
                                    <div class="border-l-4 border-green-500 pl-4 mb-6 last:mb-0">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-lg font-medium text-gray-900">{{ $education->school_name }}</h4>
                                            <!-- Edit Icon (Only shows in editing mode) -->
                                            @if(Auth::id() == $id)
                                            <div class="mt-2 text-right">
                                                <button onclick="openEducationModal({{ $education->id }})" class="education-edit-btn hidden text-blue-500 hover:text-blue-700">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M15.232 5.232l3.536 3.536M16.732 3.732a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            @endif
                                        </div>
                                        <p class="text-green-600 font-medium mb-2">{{ $education->education_level ? $education->education_level . ', ' : ''}}{{ $education->studyField->name }}</p>
                                        <p class="text-sm text-gray-500">
                                            {{ $education->date_start ? $education->date_start->format('F Y') : 'Unknown'}} -
                                            {{ $education->date_end ? $education->date_end->format('F Y') : 'Present' }}
                                        </p>
                                        @if($education->gpa)
                                            <p class="text-gray-600">GPA: {{ $education->gpa }}</p>
                                        @endif
                                        
                                        <!-- Edit Modal -->
                                        <div id="modal-education-{{ $education->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                            <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
                                                <button onclick="closeEducationModal({{ $education->id }})" class="absolute top-4 right-4 text-gray-500 hover:text-red-600 text-2xl font-bold focus:outline-none">&times;</button>
                                                <h2 class="text-lg font-semibold mb-4">Edit Education</h2>
                                                @include('educations._edit_form', ['education' => $education])
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                
                                @if(Auth::id() == $id)
                                <!-- Create Modal -->
                                <div id="modal-education-create" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                                    <div class="modal-content bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
                                        <button onclick="closeEducationModal('create')" class="absolute top-4 right-4 text-gray-500 hover:text-red-600 text-2xl font-bold focus:outline-none">&times;</button>
                                        <h2 class="text-lg font-semibold mb-4">Add Education</h2>
                                        @include('educations._create_form')
                                    </div>
                                </div>
                                @endif
                            </div>

                            <!-- Uploaded Document Section -->
                            <div class="bg-white rounded-lg shadow-md p-6">
                                <div class="flex justify-between items-center mb-4">
                                    <h3 class="text-xl font-semibold text-gray-900">Document</h3>
                                    @if(Auth::id() == $id)
                                    <div class="flex items-center space-x-2">
                                        <!-- Add btn -->
                                        <button onclick="toggleDocumentUploadForm()" class="text-green-600 hover:text-green-800 transition-colors" title="Upload Resume">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                            </svg>
                                        </button>
                                        <!-- Edit btn -->
                                        <button onclick="toggleDocumentEdit()" class="text-blue-500 hover:text-blue-700 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                                
                                <!-- Upload Form (Hidden by Default) -->
                                @if(Auth::id() == $id)
                                <div id="resume-upload-form" class="mb-6 hidden">
                                    <form method="POST" action="{{ route('dashboard.documents.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-4">
                                            <input type="file" name="file" accept="application/pdf" required
                                                class="block w-full text-sm text-gray-700 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" />
                                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm">Upload</button>
                                        </div>
                                    </form>
                                </div>
                                @endif

                                <!-- Document List -->
                                @foreach($user->resume->documents as $document)
                                <div class="border-l-4 border-orange-500 pl-4 mb-6 last:mb-0">
                                    <div class="flex justify-between items-start mb-2">
                                        <h4 class="text-lg font-medium text-gray-900">{{ basename($document->file_path) }}</h4>
                                        @if(Auth::id() == $id)
                                        <!-- Delete Button (Hidden by Default) -->
                                        <button onclick="document.getElementById('confirm-delete-{{ $document->id }}').classList.remove('hidden')" 
                                            class="flex items-center text-red-600 hover:text-red-800 text-sm font-semibold resume-delete-btn hidden">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                            Delete Document
                                        </button>
                                        @endif
                                    </div>
                                    <div class="flex gap-4 text-sm text-blue-600">
                                        <a href="{{ asset($document->file_path) }}" target="_blank" class="underline hover:text-blue-800">Preview</a>
                                        <a href="{{ asset($document->file_path) }}" download class="underline hover:text-blue-800">Download</a>
                                    </div>

                                    <!-- Delete Confirmation Modal -->
                                    <div id="confirm-delete-{{ $document->id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
                                        <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm">
                                            <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
                                            <p class="text-gray-600 mb-6">Are you sure you want to delete this document?</p>

                                            <div class="flex justify-between">
                                                <!-- Cancel -->
                                                <button type="button"
                                                    onclick="document.getElementById('confirm-delete-{{ $document->id }}').classList.add('hidden')"
                                                    class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                                                    Cancel
                                                </button>

                                                <!-- Delete Form -->
                                                <form id="delete-document-form-{{ $document->id }}" method="POST" action="{{ route('dashboard.documents.destroy', $document) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="submitDeleteDocumentForm({{ $document->id }})" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                                        Confirm Delete
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
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

<script>
    // Listen for ESC key globally
    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeAllModals();
        }
    });

    // Close all modals
    function closeAllModals() {
        document.querySelectorAll('[id^="modal-"]').forEach(modal => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');

            // Reset form inside modal (if any)
            const form = modal.querySelector('form');
            if (form) form.reset();
        });
    }

    // Profile section
    function openProfileModal() {
        const modal = document.getElementById('profile-edit-modal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        // Add click-outside detection
        addBackdropClickListener(modal);
    }

    function closeProfileModal() {
        const modal = document.getElementById('profile-edit-modal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');

        // Reset form inside modal
        const form = modal.querySelector('form');
        if (form) form.reset();
    }

    // About section
    function aboutEditor(initial) {
        return {
            originalText: initial,
            editableText: initial,
            editMode: false,
            toggleEdit() {
                this.editMode = !this.editMode;
                if (this.editMode) {
                    this.editableText = this.originalText;
                }
            },
            cancelEdit() {
                this.editMode = false;
                this.editableText = this.originalText;
            }
        }
    }

    // Work Experience section
    function toggleWorkExperienceEdit() {
        document.querySelectorAll('.work-edit-btn').forEach(btn => {
            btn.classList.toggle('hidden');
        });
    }

    function openWorkExperienceModal(id) {
        const modal = document.getElementById(`modal-workExperience-${id}`);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        // Add click-outside detection
        addBackdropClickListener(modal);
    }

    function closeWorkExperienceModal(id) {
        const modal = document.getElementById(`modal-workExperience-${id}`);
        modal.classList.add('hidden');
        modal.classList.remove('flex');

        // Reset form inside modal
        const form = modal.querySelector('form');
        if (form) form.reset();
    }

    // Education section
    function toggleEducationEdit() {
        document.querySelectorAll('.education-edit-btn').forEach(btn => {
            btn.classList.toggle('hidden');
        });
    }

    function openEducationModal(id) {
        const modal = document.getElementById(`modal-education-${id}`);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        // Add click-outside detection
        addBackdropClickListener(modal);
    }

    function closeEducationModal(id) {
        const modal = document.getElementById(`modal-education-${id}`);
        modal.classList.add('hidden');
        modal.classList.remove('flex');

        // Reset form inside modal
        const form = modal.querySelector('form');
        if (form) form.reset();
    }

    // Document section
    function toggleDocumentUploadForm() {
        document.getElementById('resume-upload-form').classList.toggle('hidden');
    }

    function toggleDocumentEdit() {
        document.querySelectorAll('.resume-delete-btn').forEach(btn => {
            btn.classList.toggle('hidden');
        });
    }

    function submitDeleteDocumentForm(id) {
        const form = document.getElementById('delete-document-form-' + id);
        if (form) {
            form.submit();
        }
    }

    // Utility
    function addBackdropClickListener(modal) {
        const modalContent = modal.querySelector('.modal-content');

        function handleClickOutside(e) {
            if (!modalContent.contains(e.target)) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');

                const form = modal.querySelector('form');
                if (form) form.reset();

                // Remove the listener to prevent duplication
                modal.removeEventListener('click', handleClickOutside);
            }
        }

        // Remove any existing listener before adding a new one
        modal.removeEventListener('click', handleClickOutside);
        modal.addEventListener('click', handleClickOutside);
    }
</script>