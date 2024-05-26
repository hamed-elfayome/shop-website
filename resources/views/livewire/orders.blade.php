<div class="mt-4 grid justify-items-center">
    <table class="w-full bg-white shadow-xl rounded-lg h-fit w-fit">
        <thead class="bg-gray-800">
        <tr>
            <td class="px-6 py-3 text-left tracking-wider text-center">
                <div class="text-md font-bold text-gray-200">My Orders</div>
            </td>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
        <tr>
            <td class="bg-gray-100">
                <div class="grid grid-cols-3">
                    <div class="px-6 py-2 col-span-1 text-left tracking-wider">
                        <div class="text-sm font-bold text-gray-800">Order Num</div>
                    </div>
                    <div class="px-6 py-2 col-span-1 text-left tracking-wider">
                        <div class="text-sm font-bold text-gray-800">Ordered at</div>
                    </div>
                    <div class="px-6 py-2 col-span-1 text-left tracking-wider">
                        <div class="text-sm font-bold text-gray-800">Total</div>
                    </div>
                </div>
            </td>
        </tr>
        @foreach($this->orders as $order)
            <tr>
                <td>
                    <a href="{{ route('viewOrder', ['orderId' => $order->id]) }}" class="block w-full hover:bg-gray-100">
                        <div class="grid grid-cols-3">
                            <div class="px-10 py-4 col-span-1">
                                <div class="text-sm font-semibold text-gray-900">#{{ $order->id }}</div>
                            </div>
                            <div class="px-4 py-4 col-span-1">
                                <div class="text-sm font-semibold text-gray-600">{{ $order->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="px-6 py-4 col-span-1">
                                <div class="text-sm font-semibold text-gray-600">{{ $order->amount_total }}</div>
                            </div>
                        </div>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($this->orders->isEmpty())
        <div class="text-gray-600 mt-4">No orders found.</div>
    @endif
</div>
