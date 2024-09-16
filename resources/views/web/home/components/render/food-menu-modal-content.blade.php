
 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
    <i class="fal fa-times"></i>
 </button>


 <form>
    <input type="hidden" name="product_id" value="{{ $product->id }}">

    <div class="fp__cart_popup_img">
    <img src="{{ asset( $product->thumb_image )}}" alt="menu" class="img-fluid w-100">
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
            <input type="hidden" name="base_price" value="{{ $product->offer_price }}">
        
            {{ currencyPosition($product->offer_price) }}
            <del>{{ currencyPosition($product->price) }} </del> 
        @else
            {{ currencyPosition($product->price) }}
            <input type="hidden" name="base_price" value="{{ $product->price }}">
        @endif 
    </h4>

    @if ($product->productSize()->exists())
        <div class="details_size">
            <h5>select size</h5>
            <div class="form-check">
                @foreach ($product->productSize as $productSize) 
                
                    <input class="form-check-input" type="radio" name="product_size" id="size-{{ $productSize->id }}" value="{{ $productSize->id }}" data-price="{{ $productSize->price }}" >

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
                    <input class="form-check-input" type="checkbox" name="product_option[]" data-price="{{ $productOption->price}}" value="{{ $productOption->id }}" id="option-{{ $productOption->id }}">

                    <label class="form-check-label" for="option-{{ $productOption->id }}">
                        {{ @$productOption->name }} <span>+ {{ currencyPosition(@$productOption->price)}}</span>
                    </label>
                </div>
                @endforeach
        </div>                
    @endif

    <div class="details_quantity">
        <h5>select quantity</h5>
        <div class="quantity_btn_area d-flex flex-wrapa align-items-center">
            <div class="quantity_btn">
                <a class="btn btn-danger decreament"><i class="fal fa-minus"></i></a>
                <input type="text" placeholder="1" value="1" name="quantity" id="quantity" readonly>
                <a class="btn btn-success increament"><i class="fal fa-plus"></i></a>

            </div>
            @if($product->offer_price > 0)
        
                <h3 id="total_price">{{ currencyPosition($product->offer_price) }} </h3> 
            @else
                <h3 id="total_price">{{ currencyPosition($product->price) }} </h3>
            @endif 
        </div>
    </div>
    <ul class="details_button_area d-flex flex-wrap">
        <li><button class="common_btn" id="modal_add_to_cart_button">add to cart</button></li>
    </ul>
    </div>
</form>


<script>
    $(document).ready(function(){

        $('input[name="product_size"]').on('change', function(){
            updateTotalPrice();
        })

        $('input[name="product_option[]"]').on('change', function(){
            updateTotalPrice();
        })


        // Product increament and decreament logic
        $('.increament').on('click', function(){
            let quantity = $('#quantity');

            let CurrentQuantity = parseFloat(quantity.val())

            quantity.val(++CurrentQuantity)

            updateTotalPrice();
        })

        $('.decreament').on('click', function(){
            let quantity = $('#quantity');

            let CurrentQuantity = parseFloat(quantity.val())

            if (CurrentQuantity > 1) {
                quantity.val(CurrentQuantity - 1)
                
                updateTotalPrice();   
            }
        })


        //update the total price based on the selected options
        function updateTotalPrice() {
            let basePice = parseFloat($('input[name="base_price"]').val());
            let baseSizePrice = 0;
            let baseOptionPrice = 0;

            let quantity = $('#quantity');
            let CurrentQuantity = parseFloat(quantity.val())


            // Calculate the selected size price 
            let SelectedSizePice = $('input[name="product_size"]:checked');

            if (SelectedSizePice.length > 0) {
                baseSizePrice = parseFloat(SelectedSizePice.data('price'));
            }

            // Calculate the selected options price 
            let SelectedOptionPice = $('input[name="product_option[]"]:checked');

            $(SelectedOptionPice).each(function() {
                baseOptionPrice += parseFloat($(this).data('price'));
            });


            // Calculate the total price 
            const totalPrice = (basePice + baseSizePrice + baseOptionPrice) * CurrentQuantity;

            // Update the total price value
            $('#total_price').text("{{ config('settings.currency_icon') }}" + totalPrice);
            
        }


        // Add product to cart

        $('#modal_add_to_cart_button').on('click', function(e) {
            e.preventDefault(); 

            //validation
            let selectedSize = $('input[name="product_size"]');

            if (selectedSize.length > 0) {
                if ($('input[name="product_size"]:checked').val() === undefined) {
                  toastr.error("Select a product size");
                  return false;
                }
            }

            selectedOption = $('input[name="product_option[]"]:checked'),

            productOptionArray = [];

            selectedOption.each(function() {
                productOptionArray.push($(this).val());
            });


            // form data to be sent
            var formData = {
                product_id: $('input[name="product_id"]').val(),
                product_size: $('input[name="product_size"]:checked').val(),
                product_option: productOptionArray,
                quantity: $('#quantity').val(),
            };

            // console.log(formData);

            $.ajax({
                method: 'POST',
                url: '{{ route("add-to-cart.store") }}',
                dataType: 'json',
                data: formData,
                beforeSend: function (){
                    $('#modal_add_to_cart_button').attr('disabled', true)
                    $('#modal_add_to_cart_button').
                    html('<span class="spinner-border spinner-border-sm text-light" role="status"  aria-hidden="true"></span>Loading...')
                },
                success: function(response) {
                  updateCart()

                  toastr.success(response.message);
   
                },
                error: function(xhr, status, error) {
                   let errorMessage = xhr.responseJSON.message;
                   toastr.error(errorMessage);
                },
                complete: function() {
                    $('#modal_add_to_cart_button').html('add to cart')
                    $('#modal_add_to_cart_button').attr('disabled', false)
                }
            });
        });

    })
</script>