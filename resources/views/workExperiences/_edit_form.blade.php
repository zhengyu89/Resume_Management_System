<form id="work-edit-form-{{ $experience->id }}" method="POST" action="{{ route('dashboard.workExperiences.update', $experience) }}">
    @csrf
    @method('PUT')

    <!-- Position -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium">Position</label>
        <input type="text" name="position" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200"
            value="{{ old('position', $experience->position) }}" required>
    </div>

    <!-- Company Name -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium">Company Name</label>
        <input type="text" name="company_name" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200"
            value="{{ old('company_name', $experience->company_name) }}" required>
    </div>

    <!-- Start Date -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium">Start Date</label>
        <input type="date" name="date_start" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200"
            value="{{ old('date_start', $experience->date_start?->toDateString()) }}" required>
    </div>

    <!-- End Date -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium">End Date</label>
        <input type="date" name="date_end" class="form-input w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200"
            value="{{ old('date_end', $experience->date_end?->toDateString()) }}">
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label class="block text-gray-700 font-medium">Description</label>
        <textarea name="description" rows="3" class="form-textarea w-full border border-gray-300 rounded-md px-3 py-1 focus:ring focus:ring-blue-200"
            placeholder="Describe your role or achievements...">{{ old('description', $experience->description) }}</textarea>
    </div>
</form>

<!-- btn row -->
<div class="flex justify-between items-center mt-6">
    <!-- Delete btn -->
    <button onclick="document.getElementById('confirm-delete-{{ $experience->id }}').classList.remove('hidden')" class="flex items-center text-red-600 hover:text-red-800 text-sm font-semibold">
        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        Delete Experience
    </button>
    <!-- Save btn -->
    <button type="button" onclick="submitWorkForm({{ $experience->id }});" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        Save
    </button>
</div>

<!-- Delete Confirmation Modal -->
<div id="confirm-delete-{{ $experience->id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center">
    <div class="bg-white p-6 rounded shadow-lg w-full max-w-sm">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
        <p class="text-gray-600 mb-6">Are you sure you want to delete this work experience?</p>

        <div class="flex justify-between">
            <!-- Cancel -->
            <button type="button"
                onclick="document.getElementById('confirm-delete-{{ $experience->id }}').classList.add('hidden')"
                class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                Cancel
            </button>

            <!-- Delete Form -->
            <form id="delete-work-form-{{ $experience->id }}" method="POST" action="{{ route('dashboard.workExperiences.destroy', $experience) }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="submitDeleteWorkForm({{ $experience->id }})" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Confirm Delete
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function submitWorkForm(id) {
    const form = document.getElementById('work-edit-form-' + id);
    if (form) form.requestSubmit();
}

function submitDeleteWorkForm(id) {
    const form = document.getElementById('delete-work-form-' + id);
    if (form) form.submit();
}
</script>
