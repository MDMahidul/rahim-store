$('#productAddConfirmBtn').click(function() {
    var ProductName = $('#ProductNameAddID').val();
    var ProductPrice = $('#ProductPriceAddID').val();
    var ProductEDate = $('#ProductExpiryAddID').val();

    addProduct(ProductName, ProductPrice, ProductEDate);
})

function addProduct(ProductName, ProductPrice, ProductEDate) {
    if (ProductName.length == 0) {
        toastr.error('Product Name Required');
    } else if (ProductPrice.length == 0) {
        toastr.error('Product Price Required');
    } else if (ProductEDate.length == 0) {
        toastr.error('Product Expire Date Required');
    } else {
        $('#productAddConfirmBtn').html("<div class='spinner-border spinner-border-sm' role='status'></div>"); //set loadin animation
        axios.post('/addProducts', {
            product_name: ProductName,
            product_price: ProductPrice,
            product_date: ProductEDate
        }).then(function(response) {
            $('#productAddConfirmBtn').html('Save');
            if (response.status == 200) {
                if (response.data == 1) {
                    toastr.success('Data Added Successfully');
                    $('.form-control').val('');
                } else {
                    toastr.error('Data Addition Failed');
                }
            } else {
                toastr.error('Something Went Wrong !');
            }
        }).catch(function(error) {
            toastr.error('Something Went Wrong !');
        })
    }
}
