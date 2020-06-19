<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller
{



    public function index(){
        $bosats = Product::where('category_id',1)->paginate(8);
        $gamnhams = Product::where('category_id',2)->paginate(8);
        $phukiens = Product::where('category_id',3)->paginate(8);
        return view('home.home',compact('bosats','gamnhams','phukiens'));
    }

    public function loaiphukien($id){
        $loaipk = Product::where('acce_id',$id)->paginate(4);
        // dd($loaipk);
        $lienquan = Product::take(4)->where('acce_id','<>',$id)->get();
        return view('home.acceshop',compact('loaipk','lienquan'));
    }


    public function loaibosat($id){
        $loaibs = Product::where('type_id',$id)->paginate(4);
        $lienquan = Product::take(4)->where('acce_id','<>',$id)->get();
        return view('home.petshop',compact('loaibs','lienquan'));
    }

    public function loaigamnham($id){
        $loaign = Product::where('nawing_id',$id)->paginate(4);
        $lienquan = Product::take(4)->where('acce_id','<>',$id)->get();
        return view('home.nawingshop',compact('loaign','lienquan'));
    }


    public function chitiet(Request $request){
        $chitiet = Product::where('id',$request->id)->first();
        $lienquan = Product::take(4)->where('type_id',$chitiet->type_id)->get();
        return view('home.details',compact('chitiet','lienquan'));
    }



}
