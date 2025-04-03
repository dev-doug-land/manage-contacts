<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Page Title') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-semibold mb-4">Contact Details</h2>
                    
                    <div class="mb-4">
                        <strong>ID:</strong> {{ $contact->id }}
                    </div>
                    <div class="mb-4">
                        <strong>Name:</strong> {{ $contact->name }}
                    </div>
                    <div class="mb-4">
                        <strong>Contact:</strong> {{ $contact->contact }}
                    </div>
                    <div class="mb-4">
                        <strong>Email:</strong> {{ $contact->email }}
                    </div>
                    
                    <div class="mt-4 text-end">
                        <button type="button" onclick="location.href='{{ route('contacts.index') }}'" class="bg-gray-500 text-white px-4 mr-2 py-2 rounded">Back to List</button>
                        <button type="button" onclick="location.href='{{ route('contacts.edit', $contact->id) }}'" class="bg-blue-500 text-white px-4 mr-2 py-2 rounded">Edit Contact</button>
                        <x-delete-modal type="button" route="{{ route('contacts.destroy', $contact->id) }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-alert-error />
  
</x-app-layout>

