
 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
    <i class="fal fa-times"></i>
 </button>
    <div class="fp__cart_popup_img">
    <img src="{{ asset('web/images/menu1.png')}}" alt="menu" class="img-fluid w-100">
    </div>
    <div class="fp__cart_popup_text">
    <a href="#" class="title">{{ $product->name }}</a>
    <p class="rating">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star-half-alt"></i>
        <i class="far fa-star"></i>
        <span>(201)</span>
    </p>
    <h4 class="price"> 
        @if($product->offer_price > 0) 
            {{ currencyPosition($product->offer_price) }}
            <del>{{ currencyPosition($product->price) }} </del> 
        @else
            {{ currencyPosition($product->offer_price) }}
        @endif 
    </h4>

    @if ($product->productSize()->exists())
        <div class="details_size">
            <h5>select size</h5>
            <div class="form-check">
                @foreach ($product->productSize as $productSize) 
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="size-{{ $productSize->id }}" checked>
                    <label class="form-check-label" for="size-{{ $productSize->id }}">
                        {{ @$productSize->name }} <span>+ {{ currencyPosition(@$productSize->price) }}</span>
                    </label>
                @endforeach
            </div>
        </div>                            
    @endif

    @if ($product->productOption()->exists())
        <div class="details_extra_item">
            <h5>select option <span>(optional)</span></h5>
                @foreach ($product->productOption as $productOption)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="option-{{ @$productOption->id }}">
                    <label class="form-check-label" for="option-{{ $productOption->id }}">
                        {{ @$productOption->name }} <span>+ ${{ @$productOption->price}}</span>
                    </label>
                </div>
                @endforeach
        </div>                
    @endif

    <div class="details_quantity">
        <h5>select quantity</h5>
        <div class="quantity_btn_area d-flex flex-wrapa align-items-center">
            <div class="quantity_btn">
                <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
                <input type="text" placeholder="1">
                <button class="btn btn-success"><i class="fal fa-plus"></i></button>
            </div>
            <h3>$320.00</h3>
        </div>
    </div>
    <ul class="details_button_area d-flex flex-wrap">
        <li><a class="common_btn" href="#">add to cart</a></li>
    </ul>
    </div>