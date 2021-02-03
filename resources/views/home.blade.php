@extends('layout.app')
@section('title','Home')

@section('content')
        <div class=" productTable d-none" id="mainDivProducts" >
            <h3 class="mb-3 text-center">Product Details</h3>
            <table id="productDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th class="th-sm">Product Name</th>
                    <th class="th-sm">Product Price</th>
                    <th class="th-sm">Product Expire Date</th>
                    <th class="th-sm">Edit</th>
                    <th class="th-sm">Delete</th>
                </tr>
                </thead>
                <tbody id="product_table">

                </tbody>
            </table>
        </div>

        <!-- loader div -->
        <div id="loaderDiv" class="container">
            <div class="row">
                <div class="col-md-12 text-center p-5">
                    <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                </div>
            </div>
        </div>

        <!-- went wrong div -->
        <div id="wrongDiv" class="container d-none">
            <div class="row">
                <div class="col-md-12 text-center p-5">
                    <h3>Something Went Wrong !</h3>
                </div>
            </div>
        </div>
        <!--Delete Modal -->
        <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body p-3 text-center">
                        <h5 class="mt-4">Do You Want To Delete</h5>
                        <h6 id="productDeleteId" class="mt-4 d-none"></h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                        <button  id="ProductDeleteConfirmBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Delete Modal end -->

        <!--Update Courses Modal -->
        <div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Product Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body  text-center">
                        <h6 id="productEditId" class="mt-4 d-none"></h6>
                        <div id="productEditForm" class="w-100 d-none">
                            <div class="row mt-4">
                                <div class="col-md-3">
                                    <label class="mb-5">Product Name</label>
                                    <label class="mb-5">Product Price</label>
                                    <label class="mb-5">Product Expire Date</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" id="productNameUpdateID" class="form-control mb-4">
                                    <input type="text" id="productPriceUpdateID" class="form-control mb-4">
                                    <input type="date" id="productDateUpdateID" class="form-control mb-4">
                                </div>
                            </div>
                        </div>

                        <!-- loader img -->
                        <img id="productUpdateLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}">
                        <h6 id="productUpdateWrong" class="d-none">Something Went Wrong !</h6>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                        <button  id="ProductUpdateConfirmBtn" type="button" class="btn  btn-sm  btn-danger">Update</button>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    <script type="text/javascript">

        getProductsData();

    </script>
@endsection
