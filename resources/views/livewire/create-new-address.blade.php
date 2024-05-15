<div class="flex justify-center items-center my-10">
    <form wire:submit.prevent="createAddress" class="w-full max-w-md bg-white shadow-xl rounded-lg px-8 py-6">
        <h2 class="text-2xl font-thin mb-4 text-center text-gray-700">New Shipping Address</h2>
        @if ($errors->any())
            <div class="mb-5">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600 text-sm">- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="country">
                Country
            </label>
            <select wire:model="country" class="shadow appearance-none border border-gray-300 rounded-xl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="country" required>
                <option value="" disabled>Select Country</option>
                <option value="Egypt" selected>Egypt</option>
            </select>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="city">
                City*
            </label>
            <x-input wire:model="city" id="city" type="text" placeholder="City" class="w-full rounded-xl" required/>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="street">
                Street*
            </label>
            <x-input wire:model="street" id="street" type="text" placeholder="Street" class="w-full rounded-xl"  required/>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="building_num">
                Building Number
            </label>
            <x-input wire:model="building_num" id="building_num" type="text" placeholder="Building Number" class="w-full rounded-xl" />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="flat_num">
                Flat Number
            </label>
            <x-input wire:model="flat_num" id="flat_num" type="text" placeholder="Flat Number" class="w-full rounded-xl" />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="postal_code">
                Postal Code
            </label>
            <x-input wire:model="postal_code" id="postal_code" type="text" placeholder="Postal Code" class="w-full rounded-xl" />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="floor">
                Floor
            </label>
            <x-input wire:model="floor" id="floor" type="text" placeholder="Floor" class="w-full rounded-xl" />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="additional_info">
                Additional Info
            </label>
            <x-input wire:model="additional_info" id="additional_info" type="text" placeholder="Additional Info" class="w-full rounded-xl" />
        </div>
        <div class="flex items-center justify-between">
            <x-button class="mx-auto rounded-xl">Save</x-button>
        </div>
    </form>
</div>
