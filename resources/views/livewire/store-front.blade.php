<div class="grid grid-cols-4 gap-8 mt-12">
    @foreach($this->products as $product)
        <div class="bg-white rounded-3xl shadow-xl p-8 text-center relative">
            <a href="{{ route('product', $product) }}" class="absolute inset-0 w-full h-full"></a>
            <img src="{{ $product->image->path }}" alt="">
            <p class="font-bold text-2xl font mt-4 border-t-2 pt-4">{{$product->name}}</p>
            <div class="text-gray-500 text-sm mt-2">{{ $product->price }}</div>
        </div>
    @endforeach
</div>
