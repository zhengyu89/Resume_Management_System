<form method="POST" action="{{ route('dashboard.educations.update', $education) }}">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">School Name</label>
        <input type="text" name="school_name" class="form-input w-full"
            value="{{ old('school_name', $education->school_name) }}">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">Study Field</label>
        <select name="study_field_id" class="form-select w-full">
            @foreach(\App\Models\StudyField::all() as $field)
                <option value="{{ $field->id }}" {{ $education->study_field_id == $field->id ? 'selected' : '' }}>
                    {{ $field->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">Start Date</label>
        <input type="date" name="date_start" class="form-input w-full"
            value="{{ old('date_start', $education->date_start?->toDateString()) }}">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">End Date</label>
        <input type="date" name="date_end" class="form-input w-full"
            value="{{ old('date_end', $education->date_end?->toDateString()) }}">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">GPA</label>
        <input type="text" name="gpa" class="form-input w-full"
            value="{{ old('gpa', $education->gpa) }}">
    </div>

    <div class="flex justify-end gap-4">
        <a href="{{ route('dashboard.show', auth()->id()) }}"
            class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded">Cancel</a>
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Save
        </button>
    </div>
</form>