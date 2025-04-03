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
                    <h2 class="text-xl font-semibold mb-4">Edit Contact</h2>
                    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label class="block text-gray-700">Name:</label>
                            <input type="text" name="name" value="{{ $contact->name }}"
                                class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Contact:</label>
                            <input type="text" name="contact" value="{{ $contact->contact }}"
                                class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-gray-700">Email:</label>
                            <input type="email" name="email" value="{{ $contact->email }}"
                                class="w-full border rounded px-3 py-2" required>
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 mr-2 py-2 rounded">Update
                                Contact</button>
                            <button type="button" onclick="location.href='{{ route('contacts.index') }}'"
                                class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-alert-error />

</x-app-layout>
