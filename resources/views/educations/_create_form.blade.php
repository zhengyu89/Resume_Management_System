<form method="POST" action="{{ route('dashboard.educations.store') }}">
    @csrf

    <div class="mb-4">
        <label for="school_name" class="block text-sm font-medium">School Name</label>
        <input type="text" name="school_name" id="school_name" class="w-full border border-gray-300 rounded" required>
    </div>

    <div class="mb-4">
        <label for="study_field_id" class="block text-sm font-medium">Study Field</label>
        <select name="study_field_id" id="study_field_id" class="w-full border border-gray-300 rounded">
            @foreach(\App\Models\StudyField::all() as $field)
                <option value="{{ $field->id }}">{{ $field->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="date_start" class="block text-sm font-medium">Start Date</label>
        <input type="date" name="date_start" id="date_start" class="w-full border border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label for="date_end" class="block text-sm font-medium">End Date</label>
        <input type="date" name="date_end" id="date_end" class="w-full border border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label for="gpa" class="block text-sm font-medium">GPA (optional)</label>
        <input type="text" name="gpa" id="gpa" class="w-full border border-gray-300 rounded">
    </div>

    <div>
        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            Save
        </button>
    </div>
</form>