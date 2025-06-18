<!DOCTYPE html>
<html lang="en">
@extends ('layouts.app')
<body>
@section('content')

    <!-- Content write inside -->

 <div class="max-w-4xl mx-auto px-4 py-10">
    <h2 class="text-4xl font-bold text-center text-indigo-600 mb-10">Frequently Asked Questions(FAQ)</h2>

     <!-- Search Bar Under FAQ Title -->
<div class="max-w-xl mx-auto mb-8">
    <div class="relative">
        <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <!-- Heroicon: Magnifying Glass -->
            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" 
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M21 21l-4.35-4.35M10.5 18a7.5 7.5 0 1 1 0-15 7.5 7.5 0 0 1 0 15z" />
            </svg>
        </span>
        <input
            type="text"
            placeholder="Search for answers"
            class="w-full pl-10 pr-4 py-3 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 shadow-sm"
        />
    </div>
</div>



  <h3 class="text-2xl font-semibold text-gray-700 mt-12 mb-4 border-b pb-1">🔹GENERAL</h3>

    <div x-data="{ selected: null }" class="space-y-4">


        @php
            $faqs = [
                ['question' => 'What is Resume Manager?', 'answer' => 'Resume Manager is an all-in-one job platform where job seekers can upload resumes, and employers can view and manage them.'],
                ['question' => 'Do I need to create an account to use the platform?', 'answer' => 'Yes, both job seekers and employers need to register to access the full features of the platform.'],
 ];
        @endphp


        @foreach($faqs as $index => $faq)
        <div x-data="{ open: false }" class="border border-gray-300 rounded-md">
            <button @click="open = !open" class="w-full text-left px-4 py-3 font-medium text-gray-800 bg-gray-100 hover:bg-gray-200 focus:outline-none">
                {{ $faq['question'] }}
            </button>
            <div x-show="open" x-transition class="px-4 py-3 text-gray-700 bg-white">
                {{ $faq['answer'] }}
            </div>
        </div>
        @endforeach


    </div>
 <h3 class="text-2xl font-semibold text-gray-700 mt-12 mb-4 border-b pb-1">🔹 For Job Seekers</h3>

    <div x-data="{ selected: null }" class="space-y-4">


        @php
            $faqs = [
                ['question' => 'How do I upload my resume?', 'answer' => 'After logging in, go to the "Upload Resume" page and submit your resume in PDF or DOCX format.'],
                ['question' => 'Can I update or replace my resume after uploading?', 'answer' => 'Yes, you can manage your resume from your profile dashboard.'],
                ['question' => 'What file formats are supported for resume upload?', 'answer' => 'Only PDF formats are allowed.'],
                ['question' => 'Is there a limit to how many resumes I can upload?', 'answer' => 'Each account can upload one active resume at a time.'],
                ['question' => 'Is my resume visible to all employers?', 'answer' => 'Yes, once uploaded, your resume is searchable by all verified employers.'],
                ['question' => 'Can I delete my resume anytime?', 'answer' => 'Yes, you can remove your resume at any time from your dashboard.'],
];
        @endphp


        @foreach($faqs as $index => $faq)
        <div x-data="{ open: false }" class="border border-gray-300 rounded-md">
            <button @click="open = !open" class="w-full text-left px-4 py-3 font-medium text-gray-800 bg-gray-100 hover:bg-gray-200 focus:outline-none">
                {{ $faq['question'] }}
            </button>
            <div x-show="open" x-transition class="px-4 py-3 text-gray-700 bg-white">
                {{ $faq['answer'] }}
            </div>
        </div>
        @endforeach

 <h3 class="text-2xl font-semibold text-gray-700 mt-12 mb-4 border-b pb-1">🔹  For Employers</h3>

    <div x-data="{ selected: null }" class="space-y-4">

        @php
            $faqs = [
                ['question' => 'How do I search for resumes?', 'answer' => 'Go to "Browse Resumes" and filter by job title, skills, or experience.'],
                ['question' => 'Can I download a candidate\'s resume?', 'answer' => 'Yes, employers can download resumes from the candidate profiles.'],
                ['question' => 'Do I need to pay to view resumes?', 'answer' => 'No, the platform is currently free for employers.'],
                ['question' => 'Can I contact a job seeker directly?', 'answer' => 'Yes, employers can send messages through the platform (if enabled).'],
];
        @endphp


        @foreach($faqs as $index => $faq)
        <div x-data="{ open: false }" class="border border-gray-300 rounded-md">
            <button @click="open = !open" class="w-full text-left px-4 py-3 font-medium text-gray-800 bg-gray-100 hover:bg-gray-200 focus:outline-none">
                {{ $faq['question'] }}
            </button>
            <div x-show="open" x-transition class="px-4 py-3 text-gray-700 bg-white">
                {{ $faq['answer'] }}
            </div>
        </div>
        @endforeach

 <h3 class="text-2xl font-semibold text-gray-700 mt-12 mb-4 border-b pb-1">🔹 Technical</h3>

    <div x-data="{ selected: null }" class="space-y-4">

        @php
            $faqs = [
                ['question' => 'What technologies are used to build Resume Manager?', 'answer' => 'The app is built with Laravel and Tailwind CSS, and runs in Laragon.'],
                ['question' => 'Is Resume Manager mobile responsive?', 'answer' => 'Yes, it works well across desktop, tablet, and mobile screens.'],
                ['question' => 'Does Resume Manager support resume parsing?', 'answer' => 'Not yet, but it is a planned feature for future updates.'],
                ['question' => 'Where are resumes stored?', 'answer' => 'They are stored in the Laravel `storage/app/public/resumes` directory.'],
                ['question' => 'Can users reset their password?', 'answer' => 'Yes, Laravel’s password reset system is available.'],
];
        @endphp


        @foreach($faqs as $index => $faq)
        <div x-data="{ open: false }" class="border border-gray-300 rounded-md">
            <button @click="open = !open" class="w-full text-left px-4 py-3 font-medium text-gray-800 bg-gray-100 hover:bg-gray-200 focus:outline-none">
                {{ $faq['question'] }}
            </button>
            <div x-show="open" x-transition class="px-4 py-3 text-gray-700 bg-white">
                {{ $faq['answer'] }}
            </div>
        </div>
        @endforeach

         <h3 class="text-2xl font-semibold text-gray-700 mt-12 mb-4 border-b pb-1">🔹 Security</h3>

    <div x-data="{ selected: null }" class="space-y-4">

        @php
            $faqs = [

                ['question' => 'Is my data secure on Resume Manager?', 'answer' => 'Yes. We use Laravel’s built-in security features to keep data safe.'],
                ['question' => 'How is authentication handled?', 'answer' => 'Laravel’s authentication system uses secure password hashing and sessions.'],
                ['question' => 'Is the platform protected from common web attacks?', 'answer' => 'Yes. Laravel protects against SQL injection, XSS, and CSRF by default.'],
                ['question' => 'Can I delete my account and data?', 'answer' => 'Yes, users can request account and data deletion from their profile.'],
            ];
        @endphp


        @foreach($faqs as $index => $faq)
        <div x-data="{ open: false }" class="border border-gray-300 rounded-md">
            <button @click="open = !open" class="w-full text-left px-4 py-3 font-medium text-gray-800 bg-gray-100 hover:bg-gray-200 focus:outline-none">
                {{ $faq['question'] }}
            </button>
            <div x-show="open" x-transition class="px-4 py-3 text-gray-700 bg-white">
                {{ $faq['answer'] }}
            </div>
        </div>
        @endforeach


    </div>
</div>

@endsection
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>