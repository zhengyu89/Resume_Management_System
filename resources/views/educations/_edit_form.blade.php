<form id="education-edit-form-{{ $education->id }}" method="POST" action="{{ route('dashboard.educations.update', $education) }}">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">School Name</label>
        <input type="text" name="school_name" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200"
                value="{{ old('school_name', $education->school_name) }}" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">Education Level</label>
        <select id="education_level_{{ $education->id }}" name="education_level" autocomplete="off" class="tom-select-field" required>
            <option value="" disabled selected>Select or type education level...</option>
            @php
                $levels = ['High School', 'Diploma', 'Bachelor\'s', 'Master\'s', 'PhD'];
                $current = old('education_level', $education->education_level ?? '');
                if ($current && !in_array($current, $levels)) {
                    $levels[] = $current;
                }
            @endphp
            @foreach($levels as $level)
                <option value="{{ $level }}" {{ $current === $level ? 'selected' : '' }}>{{ $level }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">Study Field</label>
        <select name="study_field_id" class="form-select w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200" required>
            <option value="" disabled selected>Select a study field</option>
            @foreach(\App\Models\StudyField::all() as $field)
                <option value="{{ $field->id }}" {{ $education->study_field_id == $field->id ? 'selected' : '' }}>
                    {{ $field->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">Start Date</label>
        <input type="date" name="date_start" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200" 
                value="{{ old('date_start', $education->date_start?->toDateString()) }}" required>
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">End Date</label>
        <input type="date" name="date_end" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200"
                value="{{ old('date_end', $education->date_end?->toDateString()) }}">
    </div>

    <div class="mb-4">
        <label class="block text-gray-700 font-medium">GPA</label>
        <input type="number" step="0.01" min="0" max="4" name="gpa" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200"
                value="{{ old('gpa', $education->gpa) }}">
    </div>

    
</form>

<!-- btn row -->
<div class="flex justify-between items-center mt-6">
    <!-- Delete btn -->
    <button onclick="document.getElementById('confirm-delete-{{ $education->id }}').classList.remove('hidden')" class="flex items-center text-red-600 hover:text-red-800 text-sm font-semibold">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        Delete Education
    </button>
    <!-- Save btn -->
    <button type="button" onclick="submitEducationForm({{ $education->id }});" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Save
    </button>
</div>

<!-- Delete Confirmation Modal -->
<div id="confirm-delete-{{ $education->id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to delete this education record?</p>

        <div class="flex justify-between">
            <!-- Cancel -->
            <button type="button"
                onclick="document.getElementById('confirm-delete-{{ $education->id }}').classList.add('hidden')"
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                Cancel
            </button>

            <!-- Delete Form -->
            <form id="delete_education-form-{{ $education->id }}" method="POST" action="{{ route('dashboard.educations.destroy', $education) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="submitDeleteForm({{ $education->id }})" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Confirm Delete
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function submitEducationForm(id) {
    console.log("Clicked Save");

    const form = document.getElementById('education-edit-form-' + id);
    if (form) {
        form.requestSubmit();
    }
}

function submitDeleteForm(id) {
    const form = document.getElementById(`delete-education-form-${id}`);
    if (form) {
        form.submit();
    }
}

document.addEventListener('DOMContentLoaded', function () {
    @foreach($user->resume->educations as $education)
        new TomSelect('#education_level_{{ $education->id }}', {
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
    @endforeach
});
</script>