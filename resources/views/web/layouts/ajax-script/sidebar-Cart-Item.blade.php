@foreach ($cartProducts as $cartProduct)
<li>
    <div class="menu_cart_img">
        <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu" class="img-fluid w-100">
    </div>
    <div class="menu_cart_text">
        <a class="title" href="{{ $cartProduct->options->product_info['slug'] }}">{{ $cartProduct->name }} </a>
        <p class="size">Qty: {{ $cartProduct->qty }}</p>

        <p class="size">{{ @$cartProduct->options->product_size[0]['name'] }}</p>

        @foreach ($cartProduct->options->product_options as $productOptions)
            <span class="extra">{{ @$productOptions['name'] }}</span>   
        @endforeach
        
        <p class="price">{{ currencyPosition($cartProduct->price) }}</p>
    </div>
    <span class="del_icon"><i class="fal fa-times"></i></span>
</li>  
@endforeach