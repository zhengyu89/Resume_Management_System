<form method="POST" action="{{ route('dashboard.educations.store') }}">
    @csrf

    <div class="mb-4">
        <label for="school_name" class="block text-sm font-medium">School Name</label>
        <input type="text" name="school_name" id="school_name" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200" required>
    </div>

    <div class="mb-4">
        <label for="study_field_id" class="block text-sm font-medium">Study Field</label>
        <select name="study_field_id" id="study_field_id" class="form-select w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200">
            @foreach(\App\Models\StudyField::all() as $field)
                <option value="{{ $field->id }}">{{ $field->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label for="date_start" class="block text-sm font-medium">Start Date</label>
        <input type="date" name="date_start" id="date_start" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200" required>
    </div>

    <div class="mb-4">
        <label for="date_end" class="block text-sm font-medium">End Date</label>
        <input type="date" name="date_end" id="date_end" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200">
    </div>

    <div class="mb-4">
        <label for="gpa" class="block text-sm font-medium">GPA</label>
        <input type="text" name="gpa" id="gpa" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200">
    </div>

    <div class="flex justify-end">
        <button type="submit" class="text-white px-4 py-2 rounded bg-blue-600 hover:bg-blue-700">
            Save
        </button>
    </div>
</form>