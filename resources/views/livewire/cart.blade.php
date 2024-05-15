<div class="mt-16">
    <div class="grid grid-cols-4 gap-x-4">
        <table class="w-full bg-white shadow-xl rounded-lg h-fit col-span-3">
            <thead class="bg-gray-200">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Product</th>
                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Price</th>
                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Size</th>
                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Color</th>
                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Quantity</th>
                <th class="px-6 py-3 text-left text-sm font-semibold uppercase tracking-wider">Sub-Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($this->items as $item)
                <tr>
                    <td class="px-6 py-4">
                        <a href="{{ route('product', $item->product ) }}">
                            <div class="text-sm font-semibold text-blue-900">{{ $item->product->name }}</div>
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-gray-600">{{ $item->product->price }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-gray-600">{{ $item->variant->size }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-gray-600">{{ $item->variant->color }}</div>
                    </td>
                    <td class="px-6 py-4 flex items-center w-28 justify-between">
                        @if($item->quantity > 1)
                            <button wire:click="decrement({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-600">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                            </button>
                        @else
                            <div class="mx-2.5"></div>
                        @endif

                        <div class="text-sm font-semibold text-gray-900">{{ $item->quantity }}</div>
                        <button wire:click="increment({{ $item->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-5 h-5 text-gray-600">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                        </button>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-semibold text-gray-600">{{ $item->subtotal }}</div>
                    </td>
                    <td class="px-4">
                        <button wire:click="delete({{ $item->id }})">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                                 stroke="red" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                            </svg>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="5" class="px-6 py-4 text-right">
                    <div class="text-md font-bold text-gray-800">Total</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-bold text-gray-800">{{ $this->cart->total }}</div>
                </td>
            </tr>
            </tfoot>
        </table>
        <div class="w-full bg-white shadow-md rounded-xl p-5 col-span-1 h-fit flex justify-center">
            @guest
                <p class="text-center">
                    Please <a href="{{ route("register") }}" class="text-blue-600">reqister</a> or <a
                        href="{{ route("login") }}" class="text-blue-600">login</a> <br> to Checkout your order
                </p>
            @else
                @if($this->Addresses->isEmpty())
                    <a href="{{ route("createAddress") }}" class="text-blue-600">Please create shipping address</a>
                @else
                    <div class="flex flex-col gap-y-4">
                        <div>Select shipping address </br>
                            <a href="{{ route("createAddress") }}" class="text-blue-600">or create new</a></div>
                        <select wire:model="adress" class="rounded-3xl border-2 border-gray-200 shadow-lg px-5">
                            @foreach($this->Addresses as $address)
                                <option value="{{ $address->id }}">{{ substr($address->country, 0, 5) }}. {{ substr($address->city, 0, 5) }}. {{ substr($address->street, 0, 5) }}.</option>
                            @endforeach
                        </select>
                        <x-button wire:click="checkout" class="mx-auto rounded-xl">CHECKOUT</x-button>
                    </div>
                @endif

            @endguest
        </div>
    </div>
</div>
