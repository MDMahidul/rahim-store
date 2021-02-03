<?php

namespace App\Http\Controllers;

use App\ProductsModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function getProducts(){
        $result = json_encode(ProductsModel::orderBy('p_price','asc')->get());
        return $result;
    }

    function addProducts(Request $request){
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $product_date = $request->input('product_date');

        $result = ProductsModel::insert([
            'p_name'=>$product_name,
            'p_price'=>$product_price,
            'p_date'=>$product_date
        ]);
        if ($result==true){
            return "1";
        }else{
            return "0";
        }
    }

    function ProductDelete(Request $request){
        $id = $request->input('id');
        $result = ProductsModel::where('id',$id)->delete();

        if($result==true){
            return "1";
        }else{
            return "0";
        }
    }

    function ProductDetails(Request $request){
        $id = $request->input('id');
        $result = json_encode(ProductsModel::where('id',$id)->get());
        return $result;
    }

    function ProductsUpdate(Request $request){
        $id = $request->input('id');
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $product_date = $request->input('product_date');

        $result = ProductsModel::where('id',$id)->update([
            'p_name'=>$product_name,
            'p_price'=>$product_price,
            'p_date'=>$product_date
        ]);
        if ($result==true){
            return "1";
        }else{
            return "0";
        }
    }
}
