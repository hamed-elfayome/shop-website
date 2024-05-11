<div class="grid grid-cols-2 gap-5">
    <div class="content-center text-center">
        <p class="text-6xl font-bold mb-3"> {{ $this->product->name }} </p>
        <p class="text-2xl text-gray-700 mb-5 pb-5 border-b-2"> {{ $this->product->price }} </p>
        <p class="max-w-md mx-auto text-gray-500"> {{ $this->product->description }} </p>

        <select wire:model="variant" class="mt-5 rounded-3xl border-2 border-gray-200 shadow-lg px-12">
            @foreach($this->product->variants as $variant)
                <option value="{{ $variant->id }}">{{ $variant->size }} - {{ $variant->color }}</option>
            @endforeach
        </select>

        @error('variant')
        <div class="mt-2 text-red-600">{{ $message }}</div>
        @enderror

        <div class="mt-10">
            <x-button wire:click="addToCart" class="px-10 rounded-xl">Add to cart</x-button>
        </div>
    </div>

    <div class="m-10" x-data="{ image: '/{{ $this->product->image->path }}'}">
        <img x-bind:src="image" class="p-5 mb-5 border-b-2" alt="">

        <div class="grid grid-cols-3 gap-6 mx-12">
            @foreach($this->product->images as $image)
                <div
                    class="h-full bg-white shadow-lg border-2 border-gray-200 rounded-3xl content-center cursor-pointer">
                    <img src="/{{ $image->path }}" class="p-3" @click="image= '/{{ $image->path }}'" alt="">
                </div>
            @endforeach
        </div>

    </div>
</div>
