<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Product Model Link for Database Table Products
use App\product;
use Image;
// ProductImage Model Link for Database Table ProductImage, Image
use App\product_image;
use File;

class ProductsController extends Controller
{
    
	// Create Product Page shwo
	public function CreateProduct(){
		return view('Backend.pages.product.createproduct');
	}
	// Manage Product Page Show
	public function ManageProduct (){

		// return view('Backend.pages.product.manageproduct');
		 $product = product::orderBy('id', 'desc')->get();
         return view('Backend.pages.product.manageproduct')->With('product', $product);
	}
	// Edit Product Page Show
	public function EditProduct($id){
		$product = product::find($id);
        return view('Backend.pages.product.editproduct')->With('product', $product);
		
	}
	

	// StoreProduct
	public function StoreProduct( Request $request){
		 // Validate The Form Data..
		 $request->validate([
			'title'         => 'required|max:255',
			'description'   => 'required| max:1200',
			'quantity'      => 'required',
			'price'         => 'required',
			'product_image' => 'required'
	  ]);

		$products = new product; // product Medel call
		$products->category_id   = 1;
		$products->brand_id      = 1;
		$products->title         = $request->title;
		$products->description   = $request->description;
		$products->slug          = str_slug($request->title);
		$products->quantity      = $request->quantity;
		$products->price         = $request->price;
		$products->status        = 1;
		$products->offer_price   = $request->offerprice;
		$products->admin_id      = 1;

		$products->save();

		// Multiple Image Upload 
		if(count($request->product_image) > 0){
			foreach ($request->product_image as $image){
				$img = time().".". $image->getClientOriginalExtension();
				$location = public_path('image/product-image/'. $img);
				Image::make($image)->resize(203,125)->save($location);

				$products_image = new product_image;
				$products_image->product_id = $products->id;
				$products_image->image = $img;
				$products_image->save();

			}
		}
		// return back();  // Back and redirece same function
		return redirect()->route('Backend.pages.product.manageproduct');

	}

	// Update Product 
	public function ProductUpdate(Request $request ,$id){
			// Validate The Form Data..
			$request->validate([
				'title'         => 'required|max:255',
				'description'   => 'required| max:1200',
				'quantity'      => 'required',
				'price'         => 'required'
				]);

	 			$products = product::find($id);
                $products->title        = $request->title;
                $products->description  = $request->description;
                $products->slug         = str_slug($request->title);
                $products->quantity     = $request->quantity;
                $products->price        = $request->price;
                $products->offer_price  =$request->offerprice;
                // Save All Product Data into the Database
                $products->save();
        
        return redirect()->route('Backend.pages.product.manageproduct');

	}


	// Delete Product Function
	public function DeletePorduct( $id ){
		$product = product::find($id);
		if( !is_null($product)){
			$product->delete();
		}
		return redirect()->route('Backend.pages.product.manageproduct');


	}

// =====================product serction end ==================================


}
