<input type="hidden" class="cart_total" value="{{ currencyPosition(cartTotal()) }}">
<input type="hidden" class="get_cart_product_count" value="{{ count(Cart::content()) }}">

@foreach ($cartProducts as $cartProduct)
<li>
    <div class="menu_cart_img">
        <img src="{{ asset($cartProduct->options->product_info['image']) }}" alt="menu" class="img-fluid w-100">
    </div>
    <div class="menu_cart_text">
        <a class="title" href="{{ $cartProduct->options->product_info['slug'] }}">{{ $cartProduct->name }} </a>
        <p class="size">Qty: {{ $cartProduct->qty }}</p>

        <p class="size">
            {{ @$cartProduct->options->product_size['name'] }} 

            {{ 
               @$cartProduct->options->product_size['price'] ? 
               '{'. currencyPosition( @$cartProduct->options->product_size['price']) .'}' : '' 
            }} 
        </p>

        @foreach ($cartProduct->options->product_options as $productOptions)
            <span class="extra">{{ @$productOptions['name'] }} 
                 {{  @$productOptions['price'] ? 
                     '{'. currencyPosition(@$productOptions['price']) .'}' : '' 
                 }}
            </span>   
        @endforeach
        
        <p class="price">{{ currencyPosition($cartProduct->price) }}</p>
    </div>
    <span class="del_icon" onclick="removeCartProduct('{{ $cartProduct->rowId }}')"><i class="fal fa-times"></i></span>
</li>  
@endforeach