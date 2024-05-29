<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductModel;
use Product;

use function Laravel\Prompts\error;

class ProductsController extends Controller
{
    function getProducts(){
        $products = ProductModel::all();
        return view('admin.product.getProducts',['products'=>$products]);
    }
    function getProductsbyBand(Request $request)
    {
        $band = $request->input('SelectBand');
        //'band': band trong co so du lieu, where chinh la sql command
        $products = ProductModel::where('band',$band)->get();
        return view('admin.product.getProductsByBand',['products'=>$products]);
    }
    function editProduct($pid){
        $product = ProductModel::where('pid',$pid)->first();
        return view('admin.product.updateProduct',['product'=>$product]);

        
    }
    function updateProduct(Request $request, $pid){
        $product = ProductModel::where('pid',$pid)->first();
        $product->pid = $request->pid;
        $product->pname = $request->pname  ;
        $product->company = $request->company;
        $product->band = $request->band;
        $product->year = $request->year;

        if(isset($_FILES['imageFile']) && $_FILES['imageFile']['error'] === UPLOAD_ERR_OK) {
            $pimage = 'data:image/png;base64' . base64_encode(file_get_contents($_FILES['imageFile']['tmp_name']));
            $product->pimage = $pimage;
        }
        $product->save();
        return redirect('./updateProduct/'.$pid)->with("Note","Sửa thành công");
    }
}
