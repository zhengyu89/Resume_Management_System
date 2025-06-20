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
                <input type="number" name="min_experience" min="0" class="w-full border rounded px-3 py-2" value="{{ request('min_experience') }}">
            </div>
        </div>

        <div class="mt-6 text-center">
            <button type="submit" class="bg-indigo-600 text-white font-bold px-6 py-2 rounded hover:bg-indigo-700">
                Search
            </button>
        </div>
    </form>

    <!-- Results -->
    <div class="space-y-6">
        @forelse($resumes as $resume)
            <div class="bg-white shadow rounded-lg p-5">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset($resume->profile_pic ?? 'assets/profile_pics/default.jpg') }}" class="w-20 h-20 object-cover rounded-full" alt="Profile Picture">
                    <div>
                        <h2 class="text-xl font-bold">{{ $resume->user->name }}</h2>
                        <p class="text-sm text-gray-600">{{ $resume->title }}</p>
                        <p class="text-sm mt-1">
                            <strong>Study Field:</strong>
                            {{ $resume->educations->first()?->studyField->name ?? 'N/A' }}
                            |
                            <strong>Languages:</strong>
                            {{ $resume->languages->pluck('language.name')->join(', ') }}
                            |
                            <strong>Experience:</strong>
                            {{ $resume->total_experience ?? 0 }} years
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500">No matching talents found.</div>
        @endforelse
    </div>
</div>
    
@endsection
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>