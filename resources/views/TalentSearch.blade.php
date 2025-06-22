<!DOCTYPE html>
<html lang="en">
@extends ('layouts.app')
<body>
@section('content')

    <div class="max-w-6xl mx-auto px-4 py-10">
    <h2 class="text-4xl font-bold text-center text-indigo-600 mb-10">🔍 Talent Search</h2>

    <!-- Search Filters -->
    <div class="grid md:grid-cols-3 gap-6 mb-10 bg-white p-6 rounded-lg shadow">
        <div>
            <label for="language" class="block text-sm font-medium text-gray-700">Language Proficiency</label>
            <select id="language" name="language" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Select Language --</option>
                <option>English</option>
                <option>Malay</option>
                <option>Mandarin</option>
                <option>Tamil</option>
                <option>Other</option>
            </select>
        </div>

        <div>
            <label for="studyField" class="block text-sm font-medium text-gray-700">Field of Study</label>
            <select id="studyField" name="studyField" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Select Field --</option>
                <option>Computer Science</option>
                <option>Engineering</option>
                <option>Business</option>
                <option>Education</option>
                <option>Healthcare</option>
            </select>
        </div>

        <div>
            <label for="experience" class="block text-sm font-medium text-gray-700">Years of Experience</label>
            <select id="experience" name="experience" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Select --</option>
                <option value="0">0 - Fresh Graduate</option>
                <option value="1">1-2 Years</option>
                <option value="3">3-5 Years</option>
                <option value="6">6+ Years</option>
            </select>
        </div>
    </div>
    
@endsection

</body>
</html>