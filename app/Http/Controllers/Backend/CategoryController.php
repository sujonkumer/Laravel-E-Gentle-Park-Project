<?php

namespace App\Http\Controllers\Backend;
use App\Models\Category; // Category Model Link
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use File;

class CategoryController extends Controller
{   // Create category page shwo function
    public function CreateCategory(){
        $primary_categories = Category::orderBy('name','asc')->where('parent_id', NULL)->get();
        return view ('Backend.pages.categories.createcategory', compact('primary_categories'));
    }

    // Manage Category Page show
    public function ManageCategory(){
        $categories = Category::orderBy('id', 'desc')->get();
        return view ('Backend.pages.categories.managecategory')->with('categories', $categories);
   // Edit Category Page shwo
     }

    public function EditCategory( $id ){
        $primary_categories = Category::orderBy('name','asc')->where('parent_id', NULL)->get();
       	 $category = Category::find($id);
      	  if ( !is_null( $category )){
            return view('Backend.pages.categories.editcategory', compact('category','primary_categories'));
      	  }else
      	  {
            return route('managecategory');
        	}
    }



    // Store Category Function 
    public function StoreCategory(Request $request){
        $request->validate([
            'name'        => 'required|max:100',
            'description' => 'required|max:1200',
            'image'       => 'nullable|image',
         ],
         [
            'name.required'        => 'Please Provide Category Name',
            'description.required' => 'Please Provide description of the Category',
            'image.image'          => 'Please Provide a valid iamge with .jpg, .jpeg, .png extension',
         ]);

        $category = new Category;
        $category->name = $request->name;
        $category->desc = $request->description;
        $category->parent_id = $request->parent_id;
        if ($request->image){
            $image = $request->file('image');
            $img = time(). "." .$image->getClientOriginalExtension();
            $location = public_path('image/category-image/'.$img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();
        return redirect()->route('managecategory');

    }

    // Update Category Function
    public function UpdateCategory(Request $request ,$id){
        $request->validate([
            'name'        => 'required|max:100',
            'description' => 'required|max:1200',
            'image'       => 'nullable|image',
         ],
         [
            'name.required'        => 'Please Provide Category Name',
            'description.required' => 'Please Provide description of the Category',
            'image.image'          => 'Please Provide a valid iamge with .jpg, .jpeg, .png extension',
         ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->desc = $request->description;
        $category->parent_id = $request->parent_id;
        // category single image store
        if ($request->image){
            if( File::exists ('image/category-image/'. $category->image)){
                File::delete('image/category-image/'. $category->image);
            }
            $image = $request->file('image');
            $img = time().'.'. $image->getClientOriginalExtension();
            $location = public_path('image/category-image/'. $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }

        $category->save();

        session()->flush('success','A new category has been added Successfully');

        return redirect()->route('managecategory');
    }






    // Delete Category Function
    public function DeleteCategory( $id ){
        $category = Category::find($id);
        if( !is_null($category))
        { // if it is parent category, then we will delete it's sub category.
            if( $category->parent_id == NULL){
                // delete sub category
                 $sub_categories = Category::orderBy('name','asc')->where('parent_id',$category->id)->get();
                 foreach ($sub_categories as $sub) {
                      if( File::exists ('image/category-image/'. $sub->image)){
                             File::delete('image/category-image/'. $sub->image);
                         } 
                     $sub->delete();
                 }
            }
            if( File::exists ('image/category-image/'. $category->image)){
                File::delete('image/category-image/'. $category->image);
            } 
             $category->delete();
        }
        session()->flush('success','Category Successfully Deleted');
        return redirect()->route('managecategory')->with('msg',);
        // Or Return Back();
    }
}
