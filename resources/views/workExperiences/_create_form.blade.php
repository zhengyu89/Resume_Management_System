<form method="POST" action="{{ route('dashboard.workExperiences.store') }}">
    @csrf

    <!-- Position -->
    <div class="mb-4">
        <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
        <input type="text" name="position" id="position" required
               class="form-input w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200" />
    </div>

    <!-- Company Name -->
    <div class="mb-4">
        <label for="company_name" class="block text-sm font-medium text-gray-700">Company Name</label>
        <input type="text" name="company_name" id="company_name" required
               class="form-input w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200" />
    </div>

    <!-- Start Date -->
    <div class="mb-4">
        <label for="date_start" class="block text-sm font-medium text-gray-700">Start Date</label>
        <input type="date" name="date_start" id="date_start" required
               class="form-input w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200" />
    </div>

    <!-- End Date -->
    <div class="mb-4">
        <label for="date_end" class="block text-sm font-medium text-gray-700">End Date (optional)</label>
        <input type="date" name="date_end" id="date_end"
               class="form-input w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200" />
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="4"
                  class="form-textarea w-full border border-gray-300 rounded-md px-3 py-2 focus:ring focus:ring-blue-200"
                  placeholder="Describe your responsibilities or achievements..."></textarea>
    </div>

    <!-- Submit -->
    <div class="flex justify-end">
        <button type="submit" class="text-white px-4 py-2 rounded bg-blue-600 hover:bg-blue-700">
            Save
        </button>
    </div>
</form>
