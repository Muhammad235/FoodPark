<script>
// load product modal 

function loadProductModal(productId) {
    $.ajax({
        method : 'GET',
        url : '{{ route("food.menu.modal", ':productId') }}'.replace(':productId', productId),
        beforeSend: function(){
            $('.overlay-container').removeClass('d-none');
            $('.overlay').addClass('active');
        },
        success: function(response){
            // console.log(response)

            //update the modal with the html response 
            $('.insert_modal_content').html(response);

            //show the modal after loading content
            $('#cartModal').modal('show');
        },
        error: function(xhr, status, error){
            // console.error(error)

            toastr.success("An error occurred");
        },
        complete: function(){
            $('.overlay-container').removeClass('active');
            $('.overlay').addClass('d-none');
        },
    })
}


// update cart 
function updateCart(callback = null) {
    $.ajax({
        method : 'GET',
        url : "{{ route('get.cart.products') }}",
        success: function(response){

            // render cart 
            $('.cart_content').html(response)

            // update cart item count
            let cartItemCount = $('.get_cart_product_count').val();
            $('.cart_item_count').text(cartItemCount)
            
            // update cart total price
            let cartTotal = $('.cart_total').val();
            $('.cart_sub_total').text(cartTotal)

            if(callback && typeof callback === 'function') {
                callback();
            }
        },
        error: function(xhr, status, error){
            let errorMessage = xhr.responseJSON.message;
            toastr.error(errorMessage);
        },
    })
}


// update cart 
function removeCartProduct(cartId) {
    $.ajax({
        method : 'DELETE',
        url : '{{ route("delete.cart.product", ':cartId') }}'.replace(':cartId', cartId),
        beforeSend: function () {
            $('.overlay-container').removeClass('d-none');
            $('.overlay').addClass('active');
        },
        success: function(response){
            updateCart(function () {
                toastr.success(response.message)
                $('.overlay-container').addClass('d-none');
                $('.overlay').removeClass('active');
            })
            
        },
        error: function(xhr, status, error){
            let errorMessage = xhr.responseJSON.message;
            toastr.error(errorMessage);
        },
    })
}

</script>