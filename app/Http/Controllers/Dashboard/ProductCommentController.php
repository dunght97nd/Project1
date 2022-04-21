<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductComment;


class ProductCommentController extends Controller
{
    public function getDelete($id, $idProduct){
        // $productCategory = ProductCategory::all();
        // dd($productCategory);
        $productComment = ProductComment::find($id);
        $productComment->delete();
        // dd($productCategory);
        return redirect('dashboard/product/edit/'. $idProduct)->with('message', 'Delete Product Comment Success !');
    }
}
