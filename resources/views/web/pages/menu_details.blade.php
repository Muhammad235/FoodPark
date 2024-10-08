@extends('web.layouts.master')
@section('content')

    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset('web/images/counter_bg.jpg') }});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>menu Details</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li><a href="javascript:;">menu Details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->

    <!--=============================
        MENU DETAILS START
    ==============================-->
    <section class="fp__menu_details mt_115 xs_mt_85 mb_95 xs_mb_65">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-9 wow fadeInUp" data-wow-duration="1s">
                    <div class="exzoom hidden" id="exzoom">
                        <div class="exzoom_img_box fp__menu_details_images">
                            <ul class='exzoom_img_ul'>
                                @foreach ($product->productGallery as $productImage)
                                <li><img class="zoom ing-fluid w-100" src="{{ asset( @$productImage->image)}}" alt="{{ $product->name }}"></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="far fa-chevron-left"></i>
                            </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="far fa-chevron-right"></i>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_details_text">
                        <h2>{!! $product->name !!}</h2>
                        <p class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span>(201)</span>
                        </p>

                        <form>
                            <input type="hidden" name="product_id" class="product_id" value="{{ $product->id }}">

                            <h4 class="price">
                                @if($product->offer_price > 0)
                                    <input type="hidden" name="base_price" class="v_base_price" value="{{ $product->offer_price }}">

                                    {{ currencyPosition($product->offer_price) }}
                                    <del>{{ currencyPosition($product->price) }} </del>
                                @else
                                    {{ currencyPosition($product->price) }}
                                    <input type="hidden" name="base_price" class="v_base_price" value="{{ $product->price }}">
                                @endif
                            </h4>

                            <p class="short_description">{{ $product->short_description  }}</p>

                            @if ($product->productSize()->exists())
                                <div class="details_size">
                                    <h5>select size</h5>
                                    <div class="form-check">
                                        @foreach ($product->productSize as $productSize)
                                            <input class="form-check-input v_product_size" type="radio" data-price="{{ $productSize->price }}" name="product_size" value="{{ $productSize->id }}" id="size-{{ $productSize->id }}">
                                            <label class="form-check-label" for="size-{{ $productSize->id }}">
                                                {{ @$productSize->name }} <span>+  {{ currencyPosition($productSize->price) }}</span>
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
                                            <input class="form-check-input v_product_option" name="product_option[]" data-price="{{ $productOption->price }}" type="checkbox" value="{{ $productOption->id }}" id="option-{{ @$productOption->id }}">
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
                                        <a class="btn btn-danger v_decreament"><i class="fal fa-minus"></i></a>
                                        <input type="text" placeholder="1" value="1" name="quantity" id="v_quantity" readonly>
                                        <a class="btn btn-success v_increament"><i class="fal fa-plus"></i></a>
                                    </div>

                                        <h3 id="v_total_price">
                                            {{ $product->offer_price > 0 ? currencyPosition($product->offer_price) :
                                            currencyPosition($product->price) }}
                                        </h3>
                                </div>
                            </div>


                        <ul class="details_button_area d-flex flex-wrap">
                            <li><button class="common_btn" id="add_to_cart_button">add to cart</button></li>
                            <li><a class="wishlist" href="#"><i class="far fa-heart"></i></a></li>
                        </ul>
                        </form>
                    </div>
                </div>


                <div class="col-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__menu_description_area mt_100 xs_mt_70">
                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Reviews</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="menu_det_description">
                                    <p>{!! $product->long_description !!}</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                aria-labelledby="pills-contact-tab" tabindex="0">
                                <div class="fp__review_area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4>04 reviews</h4>
                                            <div class="fp__comment pt-0 mt_20">
                                                <div class="fp__single_comment m-0 border-0">
                                                    <img src="images/comment_img_1.png" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>Michel Holder <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/chef_1.jpg" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>salina khan <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/comment_img_2.png" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>Mouna Sthesia <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <div class="fp__single_comment">
                                                    <img src="images/chef_3.jpg" alt="review" class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>marjan janifar <span>29 oct 2022 </span></h3>
                                                        <span class="rating">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fad fa-star-half-alt"></i>
                                                            <i class="fal fa-star"></i>
                                                            <b>(120)</b>
                                                        </span>
                                                        <p>Sure there isn't anything embarrassing hiidden in the
                                                            middles of text. All erators on the Internet
                                                            tend to repeat predefined chunks</p>
                                                    </div>
                                                </div>
                                                <a href="#" class="load_more">load More</a>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="fp__post_review">
                                                <h4>write a Review</h4>
                                                <form>


                                                    <p class="rating">
                                                        <span>select your rating : </span>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </p>
                                                    <div class="row">
                                                        <div class="col-xl-12">
                                                            <input type="text" placeholder="Name">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <input type="email" placeholder="Email">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <textarea rows="3"
                                                                placeholder="Write your review"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="common_btn" type="submit">submit
                                                                review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fp__related_menu mt_90 xs_mt_60">
                <h2>related item</h2>
                <div class="row related_product_slider">
                    @if (count($relatedProducts) > 0)
                       @foreach ($relatedProducts as $relatedProduct)
                        <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                            <div class="fp__menu_item">
                                <div class="fp__menu_item_img">
                                    <img src="{{ asset($relatedProduct->thumb_image) }}" alt="{{ $relatedProduct->name }}" class="img-fluid w-100">
                                    <a class="category" href="javascript:;">{{ $relatedProduct->category->name }}</a>
                                </div>
                                <div class="fp__menu_item_text">
                                    <p class="rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <i class="far fa-star"></i>
                                        <span>74</span>
                                    </p>
                                    <a class="title" href="menu_details.html">{{ $relatedProduct->name }}</a>
                                    <h5 class="price">
                                        @if($relatedProduct->offer_price > 0)
                                           {{ currencyPosition($relatedProduct->offer_price) }}
                                           <del>{{ currencyPosition($relatedProduct->price) }}</del>
                                        @else
                                            {{ currencyPosition($relatedProduct->price) }}
                                        @endif
                                    </h5>
                                    <ul class="d-flex flex-wrap justify-content-center">
                                        <li><a href="javascript:;" onclick="loadProductModal('{{ $relatedProduct->id }}')" data-bs-toggle="modal" data-bs-target="#cartModal"><i class="fas fa-shopping-basket"></i></a></li>
                                        <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                        <li><a href="#"><i class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                         </div>
                       @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!--=============================
        MENU DETAILS END
    ==============================-->
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){

            $('.v_product_size').prop('checked', false);
            $('.v_product_option').prop('checked', false);
            $('#v_quantity').val(1);

            $('.v_product_size').on('change', function () {
                updateMenuTotalPrice()
            })

            $('.v_product_option').on('change', function () {
                updateMenuTotalPrice()

            })

            // Product increament and decreament logic
            $('.v_increament').on('click', function(){
                let quantity = $('#v_quantity');

                let CurrentQuantity = parseFloat(quantity.val())

                quantity.val(++CurrentQuantity)

                updateMenuTotalPrice();
            })

            $('.v_decreament').on('click', function(){
                let quantity = $('#v_quantity');

                let CurrentQuantity = parseFloat(quantity.val())

                if (CurrentQuantity > 1) {
                    quantity.val(CurrentQuantity - 1)

                    updateMenuTotalPrice();
                }
            })


            //update the total price based on the selected options
            function updateMenuTotalPrice() {
                let basePice = parseFloat($('.v_base_price').val());
                let baseSizePrice = 0;
                let baseOptionPrice = 0;

                let quantity = $('#v_quantity');
                let CurrentQuantity = parseFloat(quantity.val())


                // Calculate the selected size price
                let SelectedSizePice = $('.v_product_size:checked');

                if (SelectedSizePice.length > 0) {
                    baseSizePrice = parseFloat(SelectedSizePice.data('price'));
                }

                // Calculate the selected options price
                let SelectedOptionPice = $('.v_product_option:checked');

                $(SelectedOptionPice).each(function() {
                    baseOptionPrice += parseFloat($(this).data('price'));
                });


                // Calculate the total price
                const totalPrice = (basePice + baseSizePrice + baseOptionPrice) * CurrentQuantity;

                // Update the total price value
                $('#v_total_price').text("{{ config('settings.currency_icon') }}" + totalPrice);
            }

            // Add product to cart

            $('#add_to_cart_button').on('click', function(e) {
                e.preventDefault();


                // //validation
                let selectedSize = $('.product_size');

                if (selectedSize.length > 0) {
                    if ($('.v_product_size:checked').val() === undefined) {
                    toastr.error("Select a product size");
                    return false;
                    }
                }

                selectedOption = $('.v_product_option:checked'),

                productOptionArray = [];

                selectedOption.each(function() {
                    productOptionArray.push($(this).val());
                });


                // form data to be sent
                var formData = {
                    product_id: $('.product_id').val(),
                    product_size: $('.v_product_size:checked').val(),
                    product_option: productOptionArray,
                    quantity: $('#v_quantity').val(),
                };

                console.log(formData);

                $.ajax({
                    method: 'POST',
                    url: '{{ route("add-to-cart.store") }}',
                    dataType: 'json',
                    data: formData,
                    beforeSend: function (){
                        $('#add_to_cart_button').attr('disabled', true)
                        $('#add_to_cart_button').
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
                        $('#add_to_cart_button').html('add to cart')
                        $('#add_to_cart_button').attr('disabled', false)
                    }
                });
            });


        })
    </script>
@endpush
