//showing product data on homepage
function getProductsData() {
    axios.get('/getProducts')
        .then(function(response) {
            if (response.status == 200) {
                $('#mainDivProducts').removeClass('d-none');
                $('#loaderDiv').addClass('d-none');

                //refresh the table
                $('#productDataTable').DataTable().destroy();
                $('#product_table').empty();

                var jsonData = response.data;

                $.each(jsonData, function(i, item) {
                    $('<tr>').html(
                        "<td>" + jsonData[i].p_name + "</td>" +
                        "<td>" + jsonData[i].p_price + "</td>" +
                        "<td>" + jsonData[i].p_date + "</td>" +

                        "<td><a class='productEditBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-edit'></i></a></td>" +
                        "<td><a class='productDeleteBtn' data-id=" + jsonData[i].id + " ><i class='fas fa-trash-alt'></i></a></td>"

                    ).appendTo('#product_table');
                });

                //Table Delete Icon Click
                $('.productDeleteBtn').click(function() {
                    var id = $(this).data('id');

                    $('#productDeleteId').html(id);
                    $('#deleteProductModal').modal('show');
                });

                //Table Update Icon Click
                $('.productEditBtn').click(function() {
                    var id = $(this).data('id');
                    $('#productEditId').html(id);
                    ProductUpdateDetails(id);
                    $('#updateProductModal').modal('show');
                });

                //add data table libraies
                $('#productDataTable').DataTable({
                    "order": false
                });
                $('.dataTables_length').addClass('bs-select');

            } else {
                $('#loaderDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            }
        }).catch(function(error) {
        $('#loaderDiv').addClass('d-none');
        $('#wrongDiv').removeClass('d-none');
    });
}

//Product Delete Modal Yes Button
$('#ProductDeleteConfirmBtn').click(function() {
    var id = $('#productDeleteId').html();
    ProductDelete(id);
})

//product Delete
function ProductDelete(deleteID) {
    $('#ProductDeleteConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //set loadin animation

    axios.post('/ProductDelete', {
        id: deleteID
    }).then(function(response) {
        $('#ProductDeleteConfirmBtn').html("Yes");

        if (response.status == 200) {
            if (response.data == 1) {
                $('#deleteProductModal').modal('hide');
                toastr.success('Delete Successfully');
                getProductsData();
            } else {
                $('#deleteProductModal').modal('hide');
                toastr.error('Delete Failed');
                getProductsData();
            }
        } else {
            $('#deleteProductModal').modal('hide');
            toastr.error('Something Went Wrong !');
        }
    }).catch(function(error) {
        $('#deleteProductModal').modal('hide');
        toastr.error('Something Went Wrong !');
    });
}

//Product Update details
function ProductUpdateDetails(detailsID) {
    axios.post('/ProductDetails', {
        id: detailsID
    }).then(function(response) {
        if (response.status == 200) {
            $('#productEditForm').removeClass('d-none');
            $('#productUpdateLoader').addClass('d-none');
            $('#productUpdateWrong').addClass('d-none');

            var jsonData = response.data;
            $('#productNameUpdateID').val(jsonData[0].p_name);
            $('#productPriceUpdateID').val(jsonData[0].p_price);
            $('#productDateUpdateID').val(jsonData[0].p_date);
        } else {
            $('#productUpdateLoader').addClass('d-none');
            $('#productUpdateWrong').removeClass('d-none');
        }
    }).catch(function(error) {
        $('#productUpdateLoader').addClass('d-none');
        $('#productUpdateWrong').removeClass('d-none');
    })
}

//update  modal save button
$('#ProductUpdateConfirmBtn').click(function() {
    var productID = $('#productEditId').html();
    var productName = $('#productNameUpdateID').val();
    var productPrice = $('#productPriceUpdateID').val();
    var productDate = $('#productDateUpdateID').val();

    ProductUpdate(productID, productName, productPrice, productDate);
})

//update product data
function ProductUpdate(productID, productName, productPrice, productDate) {
    if (productName.length == 0) {
        toastr.error('Product Name Required');
    } else if (productPrice.length == 0) {
        toastr.error('Product Price Required');
    } else if (productDate.length == 0) {
        toastr.error('Product Expire Date Required');
    } else {
        $('#ProductUpdateConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>");
        axios.post('/ProductsUpdate', {
            id: productID,
            product_name: productName,
            product_price: productPrice,
            product_date: productDate
        }).then(function(response) {
            $('#ProductUpdateConfirmBtn').html('Update');
            if (response.status == 200) {
                if (response.data == 1) {
                    $('#updateProductModal').modal('hide');
                    toastr.success('Data Updated Successfully');
                    getProductsData();
                } else {
                    $('#updateProductModal').modal('hide');
                    toastr.error('Data Update Failed');
                    getProductsData();
                }
            } else {
                $('#updateProductModal').modal('hide');
                toastr.error('Something Went Wrong !');
            }
        }).catch(function(error) {
            $('#updateProductModal').modal('hide');
            toastr.error('Something Went Wrong !');
        })
    }
}
