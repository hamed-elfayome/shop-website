<div class="bg-white mt-10 mx-40 p-6 rounded-lg shadow-xl text-center">
    @if($this->order)
        <p class="text-3xl text-gray-400 font-thin mb-4">Thank you for your order!</p>
        <p class="text-lg text-gray-700">Your order (#{{ $this->order->id }}) has been successfully confirmed.</p>
        <p class="text-sm text-gray-500 mt-2">You will be redirected shortly. If not, <a href="{{ route('viewOrder', ['orderId' => $this->order->id]) }}" class="text-blue-500">click here</a>.</p>
        <script>
            setTimeout(function() {
                window.location.href = '{{ route('viewOrder', ['orderId' => $this->order->id]) }}';
            }, 5000); // 5 seconds
        </script>
    @else
        <p class="text-lg text-gray-700 mb-4" wire:poll>
            Please wait while we confirm your payment...
        </p>
        <div class="flex justify-center">
            <svg class="animate-spin h-8 w-8 text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
            <p class="text-lg text-gray-700">Processing...</p>
        </div>
    @endif
</div>
