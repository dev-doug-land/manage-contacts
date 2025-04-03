<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <i class="fas fa-address-book"></i>
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-xl font-semibold mb-4">Contact List</h2>
                        <a href="{{ url('/contacts/create') }}"
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
                                        <button onclick="event.stopPropagation()" type="button" href="{{ route('contacts.edit', $contact->id) }}"
                                            class="bg-blue-500 text-white px-3 py-1 mr-2 rounded">Edit</button>
                                        <x-delete-modal route="{{ route('contacts.destroy', $contact->id) }}" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <x-alert-error />

</x-app-layout>
