<x-nav-link href="{{ route('cart') }}" :active="request()->routeIs('cart')">
    {{ __('Cart') }}
    @if($this->count != 0)
        ({{ $this->count }})
    @endif
</x-nav-link>
