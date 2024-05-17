<div class ='md:grid md:grid-cols-3 md:gap-6'>
    <x-section-title>
        <x-slot name="title">Manage Addresses</x-slot>
        <x-slot name="description">Manage your account's shipping addresses.</x-slot>
    </x-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-md">
                <div>
                    @foreach($this->addresses as $address)
                        <div class="flex justify-between items-center text-gray-700 mr-6">
                            <div>{{ $address->country }} - {{ $address->city }} - {{ $address->street }}</div>
                            <button class="text-red-600 delete-address" wire:click="delete({{ $address->id }})">Delete</button>
                        </div>
                        <x-section-border />
                    @endforeach
                    <a href="{{ route("createAddress") }}" class="text-blue-600">
                        <x-button>
                            {{ __('Create New') }}
                        </x-button>
                    </a>
                </div>
            </div>
    </div>
</div>

