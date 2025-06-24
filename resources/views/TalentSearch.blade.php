<!DOCTYPE html>
<html lang="en">
@extends ('layouts.app')
<body>
@section('content')

<div class="max-w-6xl mx-auto px-4 py-10">
    <h2 class="text-4xl font-bold text-center text-indigo-600 mb-10">🔍 Talent Search</h2>

    <!-- Search Filters -->
    <form method="GET" action="{{ route('talent_search') }}" class="mb-8 bg-white shadow-md p-6 rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Study Field Filter -->
            <div>
                <label class="block font-semibold mb-1">Study Field</label>
                <select name="study_field_id" class="w-full border rounded px-3 py-2">
                    <option value="">All Fields</option>
                    @foreach($studyFields as $field)
                        <option value="{{ $field->id }}" {{ request('study_field_id') == $field->id ? 'selected' : '' }}>
                            {{ $field->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Language Filter -->
            <div>
                <label class="block font-semibold mb-1">Language</label>
                <select name="language_id" class="w-full border rounded px-3 py-2">
                    <option value="">All Languages</option>
                    @foreach($languages as $lang)
                        <option value="{{ $lang->id }}" {{ request('language_id') == $lang->id ? 'selected' : '' }}>
                            {{ $lang->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Min Experience Filter -->
            <div>
                <label class="block font-semibold mb-1">Minimum Work Experience (years)</label>
                <input type="number" name="min_experience" min="0" class="w-full border rounded px-3 py-2" placeholder="0" value="{{ request('min_experience') }}">
            </div>
        </div>

        <div class="mt-6 text-center">
            <button type="submit" class="bg-indigo-600 text-white font-bold px-6 py-2 rounded hover:bg-indigo-700">
                Search
            </button>
        </div>
    </form>

    <!-- Results -->
    <div class="space-y-3">
        @forelse($resumes as $resume)
            <div class="relative flex items-center justify-between bg-white shadow rounded-lg p-2 border border-gray-200">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset($resume->profile_pic ?? 'assets/profile_pics/default.jpg') }}" class="w-20 h-20 object-cover rounded-full" alt="Profile Picture">
                    <div>
                        <h2 class="text-xl font-bold text-indigo-700">{{ $resume->user->name }}</h2>
                        <p class="text-sm text-gray-600">{{ $resume->title }}</p>
                        <p class="text-sm mt-1 text-gray-500">
                            <strong>Study Field:</strong>
                            {{ $resume->educations->pluck('studyField.name')->join(', ') }}
                            |
                            <strong>Languages:</strong>
                            {{ $resume->languages->pluck('language.name')->join(', ') }}
                            |
                            <strong>Experience:</strong>
                            {{ $resume->work_exp_display }}
                        </p>
                    </div>
                </div>

                <!-- Arrow Button (direct to talent's profile) -->
                <a href="{{ route('profile', $resume->id) }}" class="absolute right-0 h-20 mb-0 w-14 flex items-center justify-center border-l border-gray-300 text-indigo-600 hover:text-indigo-800 transition" title="View Profile">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>                    
            </div>
        @empty
            <div class="text-center text-gray-500">No matching talents found.</div>
        @endforelse
    </div>
</div>
    
@endsection

</body>
</html>