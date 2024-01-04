/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";


// {{-- Set csrf at ajax header --}}
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function () {
    $("body").on("click", ".delete-item", function (e) {
        e.preventDefault()
        let route = $(this).attr('href')
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: 'DELETE',
                    url: route,
                    success: function(response){
                        // console.log(response);
                        if (response.status = 'success') {
                            Swal.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success",
                            });

                            $('#slider-table').DataTable().draw();
                            
                        }else if(response.status = 'error'){
                            Swal.fire({
                                title: "Errror!",
                                text: "Your file has been deleted.",
                                icon: "success",
                            });
                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                })
            }
        });
    });
});
