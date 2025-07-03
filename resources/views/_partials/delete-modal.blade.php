{{-- resources/views/_partials/delete-modal.blade.php --}}
<div id="delete-{{ $type }}-modal-{{ $id }}" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
        
        {{-- CORRECTED LINE: Replaces hyphens with spaces for display only --}}
        <p class="text-gray-600 mb-6">Are you sure you want to delete this {{ str_replace('-', ' ', $type) }}? This action cannot be undone.</p>
        
        <div class="flex justify-end gap-3">
            <button type="button" onclick="closeModal('delete-{{ $type }}-modal-{{ $id }}')" class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                Cancel
            </button>
            <form method="POST" action="{{ $route }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                    Confirm Delete
                </button>
            </form>
        </div>
    </div>
</div>