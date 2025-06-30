<form method="POST" action="{{ route('dashboard.educations.store') }}">
    @csrf

    <!-- School Name -->
    <div class="mb-4">
        <label for="school_name" class="block text-sm font-medium">School Name</label>
        <input type="text" name="school_name" id="school_name" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200" required>
    </div>

    <!-- Education Level -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium">Education Level</label>
        <select id="education_level_create" name="education_level" autocomplete="off" class="tom-select-field" required>
            @php
                $levels = ['High School', 'Diploma', 'Bachelor\'s', 'Master\'s', 'PhD'];
            @endphp
            @foreach($levels as $level)
                <option value="{{ $level }}">{{ $level }}</option>
            @endforeach
        </select>
    </div>

    <!-- Study Field -->
    <div class="mb-4">
        <label for="study_field_id" class="block text-sm font-medium">Study Field</label>
        <select name="study_field_id" id="study_field_id" class="form-select w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200" required>
            <option value="" disabled selected>Select a study field</option>
            @foreach(\App\Models\StudyField::all() as $field)
                <option value="{{ $field->id }}">{{ $field->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Date Start -->
    <div class="mb-4">
        <label for="date_start" class="block text-sm font-medium">Start Date</label>
        <input type="date" name="date_start" id="date_start" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200" required>
    </div>

    <!-- Date End -->
    <div class="mb-4">
        <label for="date_end" class="block text-sm font-medium">End Date</label>
        <input type="date" name="date_end" id="date_end" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200">
    </div>

    <!-- Gpa -->
    <div class="mb-4">
        <label for="gpa" class="block text-sm font-medium">GPA</label>
        <input type="number" step="0.01" min="0" max="4" name="gpa" id="gpa" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200">
    </div>

    <!-- Save btn -->
    <div class="flex justify-end">
        <button type="submit" class="text-white px-4 py-2 rounded bg-blue-600 hover:bg-blue-700">
            Save
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new TomSelect('#education_level_create', {
            create: true,
            persist: false,
            maxItems: 1,
            placeholder: 'Select or type education level...',
            onInitialize: function () {
                const control = this.control;

                // Apply Tailwind styling to the internal control div
                control.classList.add(
                    'w-full',
                    'border',
                    'border-gray-300',
                    'rounded-md',
                    'px-3',
                    'py-2',
                    'focus-within:ring',
                    'focus-within:ring-blue-200',
                    'text-sm',
                    'text-gray-900',
                    'form-select',
                );
            }
        });
    });
</script>