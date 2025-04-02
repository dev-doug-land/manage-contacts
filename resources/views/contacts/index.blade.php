<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold mb-4">Contact List</h2>
                        <a href="{{ route('contacts.create') }}"
                            class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Contact</a>
                    </div>

                    <table class="min-w-full bg-white border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Contact</th>
                                <th class="border px-4 py-2">Email</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr onclick="window.location='{{ route('contacts.show', $contact->id) }}'"
                                    class="cursor-pointer hover:bg-gray-100">
                                    <td class="border px-4 py-2">{{ $contact->id }}</td>
                                    <td class="border px-4 py-2">{{ $contact->name }}</td>
                                    <td class="border px-4 py-2">{{ $contact->contact }}</td>
                                    <td class="border px-4 py-2">{{ $contact->email }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('contacts.edit', $contact->id) }}"
                                            class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                                        <button onclick="event.stopPropagation(); showDeleteModal({{ $contact->id }})"
                                            class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg w-96">
            <h2 class="text-lg font-semibold mb-4">Confirm Delete</h2>
            <p>Are you sure you want to delete this contact?</p>
            <div class="mt-4 flex justify-end">
                <button onclick="hideDeleteModal()"
                    class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancel</button>
                <form id="deleteForm" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function showDeleteModal(contactId) {
            document.getElementById('deleteForm').action = `/contacts/${contactId}`;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function hideDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
        }
    </script>
</x-app-layout>
