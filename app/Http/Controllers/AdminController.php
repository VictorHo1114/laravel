<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;

class AdminController extends Controller
{
   public function view_catagory(){
    $data = Catagory::all();
    return view('admin.catagory',compact('data'));
   }

   public function add_catagory(Request $request){
    $request->validate([
        'Catagory_name' => 'required|string|max:255',
    ]);
    $data = new Catagory();
    $data->Catagory_name = $request->Catagory_name;
    $data->save();
    return redirect()->back()->with('message', 'Category Added Successfully');
   }
   public function delete_catagory($id){   
    $data = catagory::find($id);
    $data->delete();
    return redirect()->back();

   }
   public function view_product(){   
    $catagory = Catagory::all();
    return view('admin.product',compact('catagory'));
   }

public function add_product(Request $request){
    // Validate the request inputs
    $request->validate([
        'title' => 'string|max:255|nullable',
        'descrpition' => 'string|nullable',
        'price' => 'numeric|nullable',
        'quantity' => 'integer|nullable',
        'discout_price' => 'nullable|numeric',
        'catagory' => 'string|max:255|nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate the image
    ]);

    // Create a new product instance
    $product = new Product(); // Ensure the 'Product' model name is correct
    $product->title = $request->title;
    $product->descrpition = $request->descrpition;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->discout_price = $request->discout_price;
    $product->catagory = $request->catagory;


    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('product'), $imagename);
        $product->image = $imagename;
    }

    // Save the product to the database
    $product->save();

    // Return a success response
    return back()->with('message', 'Product added successfully.');
}

public function show_product(){   
    $product = Product::all();
    return view('admin.show_product',compact('product'));
   }



}
