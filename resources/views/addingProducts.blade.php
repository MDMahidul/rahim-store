@extends('layout.app')
@section('title','Add Products')

@section('content')
                <div class=" addpro">
                <div class=" p-4 text-center">
                    <div id="productAddForm" class="w-100 ">
                        <h3 class="mb-2">Add New Product</h3>
                        <hr>
                        <div class="row mt-5">
                            <div class="col-md-4 mt-2">
                                <label class="mb-4">Product Name</label>
                                <label class="mb-4">Product Price</label>
                                <label class="mb-4">Product Expire Date</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text"  id="ProductNameAddID" class="form-control form-control-sm  mb-4" placeholder="Enter Product Name">
                                <input type="text" id="ProductPriceAddID" class="form-control form-control-sm mb-4" placeholder="Enter Product Price">
                                <input type="date" id="ProductExpiryAddID" class="form-control form-control-sm mb-4">
                            </div>
                        </div>
                        <button  id="productAddConfirmBtn" type="button" class="btn btn-sm btn-danger mt-3">Save</button>
                    </div>
                </div>

                </div>

@endsection

@section('script')
    <script type="text/javascript">

    </script>
@endsection
