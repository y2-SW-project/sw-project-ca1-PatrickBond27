<?php

namespace App\Http\Controllers\Admin;

// It takes and uses the functions and the files that it takes from.
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Hash;

// This controller holds all the main functions that provides to the user which in this case it is the admin. 
// These functions have routes that were added in the web.php file.
class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // The index function views the products.
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', [
            // the view can see the products (the green one)
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // The store function stores the products that are created and saves it in the database.
    // It validates the input that is required for creating and storing the product in the database.
    public function store(Request $request)
    {
        // when user clicks submit on the create view above
        // the product will be stored in the DB
        $request->validate([
            //    'image_name' => 'mimes:jpeg,bmp,png',
                'name' => 'required',
                'description' =>'required|max:500',
                'price' =>'required',
                'product_image' => 'file|image'
            ]);
    
            // This requests the file for the image input.
            $product_image = $request->file('product_image');
            $filename = $product_image->hashName();
    
            $path = $product_image->storeAs('public/images', $filename);
    
            // if validation passes create the new book
            $product = new Product();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->weight = $request->input('weight');
            $product->price = $request->input('price');
            $product->image_location = $filename;
            $product->save();
    
            return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // The show function views each hotel in detail.
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // The edit function edits the hotel like the name or address.
    public function edit($id)
    {
        // get the hotel by ID from the Database
        $product = Product::findOrFail($id);

        // Load the edit view and pass the hotel to
        // that view
        return view('admin.products.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // The update function requests the id and updates the existing hotel and saves it in the database.
    public function update(Request $request, $id)
    {
        // first get the existing product that the user is update
        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'description' =>'required|max:500',
            'price' => 'required'
        ]);

        // if validation passes then update existing product
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->weight = $request->input('weight');
        $product->price = $request->input('price');
        $product->save();

        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // The destroy function deletes the hotel from the database.
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
