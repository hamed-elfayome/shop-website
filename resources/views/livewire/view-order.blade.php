<div class="mt-10 mx-10">
    <table class="w-full bg-white shadow-xl rounded-lg h-fit">
        <thead class="bg-gray-200">
        <tr>
            <td colspan="5" class="px-6 py-3 text-left tracking-wider">
                <div class="text-md font-bold text-gray-800">Order #{{ $this->order->id }}</div>
            </td>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        @foreach($this->order->items as $item)
            <tr>
                <td class="px-6 py-4">
                    <div class="text-sm font-semibold text-gray-900">{{ $item->name }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-semibold text-gray-600">{{ $item->price }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-semibold text-gray-600">{{ $item->description }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-semibold text-gray-600">{{ $item->quantity }}</div>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-semibold text-gray-600">{{ $item->amount_total }}</div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="px-6 py-4 text-right">
                <div class="text-md font-bold text-gray-800">Total</div>
            </td>
            <td class="px-6 py-4">
                <div class="text-sm font-bold text-gray-800">{{ $this->order->amount_total }}</div>
            </td>
        </tr>
        </tfoot>
    </table>
    <div class="mt-8 p-6 bg-white rounded-lg shadow-xl w-fit">
        <div class="text-lg font-bold text-gray-800 mb-4">Shipping Address</div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
            <div>
                <p><span class="font-semibold">Country:</span> {{ $this->order->shipping_address["country"] }}</p>
                <p><span class="font-semibold">City:</span> {{ $this->order->shipping_address["city"] }}</p>
                <p><span class="font-semibold">Street:</span> {{ $this->order->shipping_address["street"] }}</p>
                @if($this->order->shipping_address["building_num"])
                    <p><span class="font-semibold">Building Number:</span> {{ $this->order->shipping_address["building_num"] }}</p>
                @endif
            </div>
            <div>
                @if($this->order->shipping_address["postal_code"])
                    <p><span class="font-semibold">Postal Code:</span> {{ $this->order->shipping_address["postal_code"] }}</p>
                @endif
                @if($this->order->shipping_address["floor"])
                    <p><span class="font-semibold">Floor:</span> {{ $this->order->shipping_address["floor"] }}</p>
                @endif
                @if($this->order->shipping_address["flat_num"])
                    <p><span class="font-semibold">Flat Number:</span> {{ $this->order->shipping_address["flat_num"] }}</p>
                @endif
                @if($this->order->shipping_address["additional_info"])
                    <p><span class="font-semibold">Additional Info:</span> {{ $this->order->shipping_address["additional_info"] }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
