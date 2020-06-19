<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductValidaton;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Customer;
use App\ProductType;
use App\ProductAcce;
use App\ProductNawing;
class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
    //     $categorys = Category::all();
    //     $types = ProductType::all();
    //     $acces = ProductAcce::all();
    //     $nawings = ProductNawing::all();
    //     return view('admin.products.create',compact('categorys','types','acces','nawings'));

        $atribute['category'] = Category::all();
        $atribute['acce'] = ProductAcce::all();
        $atribute['types'] = ProductType::all();
        $atribute['nawings'] = ProductNawing::all();
        return response()->json($atribute);

     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductValidaton $request)
    {
        $atribute = $request->all();



        if($request->hasFile('image')){
            $image = base64_encode(file_get_contents($request->file('image')));
            $atribute['image'] = 'data:image/;base64,'.$image;
        }
        Product::create($atribute);


        return response()->json($atribute);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::findOrFail($id);
        // $products['category'] = Category::find($products['category_id'])->name;
        // $products['acce'] = ProductAcce::find($products['acce_id'])->name;
        // $products['nawing'] = ProductNawing::find($products['nawing_id'])->name;
        // $products['type'] = ProductType::find($products['type_id'])->name;
        return response()->json($products,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        // $products->categoryid;
        // $products->product_acce;
        // $products->product_type;
        // $products->product_nawing;
        $products->category = Category::all();
        $products->acce = ProductAcce::all();
        $products->nawings = ProductNawing::all();
        $products->types = ProductType::all();
        // $data['products'=>$products, 'category'=>$categorys,];
        return response()->json($products);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductValidaton $request, $id)
    {
        $product = Product::findOrFail($id);
        $atribute = $request->all();

        if($request->hasFile('image')){
            // lấy file image
            $image = base64_encode(file_get_contents($request->file('image')));
            $atribute['image'] = 'data:image/;base64,'.$image; //gán thêm đuôi
        }
        $product->update($atribute);

        return response()->json($atribute);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json($product);

    }

    public function view(){
        return view('admin.products.index1');
    }
}
