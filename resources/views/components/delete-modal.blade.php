<script>
    function showDeleteModal(route) {
        document.getElementById('deleteForm').action = route;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function hideDeleteModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-lg font-semibold mb-4">Confirm Delete</h2>
        <p>Are you sure you want to delete this item?</p>
        <div class="mt-4 flex justify-end">
            <button type="button" onclick="event.stopPropagation(); hideDeleteModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-4">Cancel</button>
            <form id="deleteForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            </form>
        </div>
    </div>
</div>

<!-- Delete Button -->
<button onclick="event.stopPropagation(); showDeleteModal('{{ $route }}')"
    class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
