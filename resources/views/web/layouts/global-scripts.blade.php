<script>
// load product modal 

function loadProductModal(productId) {
    $.ajax({
        method : 'GET',
        url : '{{ route("food.menu.modal", ':productId') }}'.replace(':productId', productId),
        beforeSend: function(){
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
            console.error(error)
        },
        complete: function(){
            $('.overlay').removeClass('active');
        },
    })
}

</script>