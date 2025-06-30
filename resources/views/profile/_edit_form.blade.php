<form method="POST" action="{{ route('dashboard.resume.update', $user->resume) }}">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" name="name" class="form-input w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                value="{{ old('name', $user->name) }}" required>
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" class="form-input w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                value="{{ old('title', $user->resume->title) }}">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Address</label>
        <input type="text" name="address" class="form-input w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                value="{{ old('address', $user->resume->address) }}">
    </div>

    <div class="mb-4">
        <label class="block text-sm font-medium text-gray-700">Phone Number</label>
        <input type="text" name="phone_number" class="form-input w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                value="{{ old('phone_number', $user->resume->phone_number) }}">
    </div>

    <div class="mb-4">
        <label for="languages" class="block text-sm font-medium text-gray-700">Languages</label>
        <select name="languages[]" id="languages" multiple>
            @foreach($availableLanguages as $language)
                <option value="{{ $language->id }}" 
                    {{ in_array($language->id, $user->resume->languages->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $language->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-end gap-2 mt-6">
        <button type="button" onclick="closeProfileModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
            Cancel
        </button>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Save
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new TomSelect("#languages", {
            plugins: ['remove_button'],
            persist: false,
            create: false,
            maxItems: null,
            placeholder: "Select languages...",
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