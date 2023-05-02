<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image as Image;

class categoryController extends Controller
{
    public function CategoryView(){

    	$category = Category::latest()->get();
    	return view('admin.Backend.Category.category',compact('category'));
    }

    public function CategoryStore(Request $request){

       $request->validate([
    		'category_name' => 'required',
			'category_image' => 'required',
    		// 'category_icon' => 'required',
    	],[
    		'category_name.required' => 'Input Category Name',
			'category_image.required' => 'Input Category Image',
    	]);
		
		$image = $request->file('category_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

    	Image::make($image)->save('upload/category/'.$name_gen);
    	$save_url = 'upload/category/'.$name_gen;
    	 

	Category::insert([
		'category_name' => $request->category_name,
		'category_image' => $save_url,
		'feature' => $request->featured,
	
		// 'category_icon' => $request->category_icon,
		'created_at' => Carbon::now(),   

    	]);

	    $notification = array(
			'message' => 'Category Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 

	public function CategoryEdit($id){
    	$category = Category::findOrFail($id);
    	return view('admin.Backend.Category.category_edit',compact('category'));

    }


    public function CategoryUpdate(Request $request ,$id){

		$old_img = $request->old_image;

    	if ($request->file('category_image')) {

    	// unlink($old_img);
		$image = $request->file('category_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->save('upload/category/'.$name_gen);
    	$save_url = 'upload/category/'.$name_gen;

      Category::findOrFail($id)->update([
		'category_name' => $request->category_name,
		'category_image' => $save_url,
		'feature' => $request->featured,
		// 'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
		// 'category_icon' => $request->category_icon,

    	]);

	    $notification = array(
			'message' => 'Category Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('category.view')->with($notification);

	}else{

		Category::findOrFail($id)->update([
			'category_name' => $request->category_name,
			'feature' => $request->featured,
			// 'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
			// 'category_icon' => $request->category_icon,
	
			]);

			$notification = array(
				'message' => 'Category Updated Successfully',
				'alert-type' => 'success'
			);
	
			return redirect()->route('category.view')->with($notification);
	}


    } // end method


    public function CategoryDelete($id){

    	Category::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Category Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    } // end method 
}
