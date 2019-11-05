<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Option_value;
use App\Models\Combination;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\FileUpload;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    } 

    public function get(Request $request)
    {
        //
        $products = Product::with('option')->orderBy('created_at', 'desc')->get();
       return response()->json($products);
       // return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');

        //
        if($request->get('cover'))
        {
            $image = $request->get('cover');
          $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
          \Image::make($request->get('cover'))->save(public_path('images/').$name);
          $data['cover'] = $name;
          
        } 

        $category_id = $data['category_id'];
        $product = Product::create($data);
        $product->category()->attach($category_id);

        return response()->json($product);
    }


    
    
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function option_store(Request $request)
    {
        //
        $data = $request->except('_token', '_method');
       
        $product = new Product;
        $thisproduct = $product->where('id', $data['product_id'])->first();
        $optionValues = $data['selected_option_values'];
        foreach($optionValues as $value){
             
            $thisproduct->option()->attach($value);
           
        }
        $productoption = Product::orderBy('created_at', 'desc')->get();

        return response()->json($productoption);
    } 


    public function option_get(Request $request)
    {
        //
       
        $productoption = Option_value::orderBy('created_at', 'desc')->get();
        return response()->json($productoption);

       // return view('welcome', ['products'=>$products, 'productoption'=>$productoption]);
    }
    
    
    public function option_destroy($product, Request $request)
    {
        //
        $product = Product::findOrFail($product);
      
       
        $product->option()->detach($request->input('options_id'));
       

        return response()->json("ok");

       
    }
    

    public function combination_get(Request $request)
    {
       $combinations = Combination::with('product_option')->orderBy('created_at', 'desc')->get();
      
        return response()->json($combinations);
    }

    public function combination_values_get($product_id)
    {  
        $product = New Product;
        $thisproduct = $product->where('id', $product_id)->first();
        $combinationValues = $thisproduct->option()->get();
      
        return response()->json($combinationValues);
    }

    public function combination_store(Request $request)
    {
        //
        $data = $request->except('_token', '_method');
       
        $combination = new Combination;
        
        $optionValues = $data['selected_option_values'];
         
        $combination->product_id = $data['product_id'];
        $combination->price = $data['price'];
        $combination->quantity = $data['qty'];

         $combination->save();
        $combination->product_option()->attach($optionValues);

        $combinations = Combination::orderBy('created_at', 'desc')->get();

        return response()->json($combinations);
    } 


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::findOrFail($id);
      
        $product->category()->detach();
        Product::destroy($id);

        return response()->json("ok");
    }


    public function product_option_values(Request $request)
    {
       $products = Products::orderBy('created_at', 'desc')->get();
         
       foreach($product as $products){

         
       }
      
        return response()->json($combinations);
    }
}
