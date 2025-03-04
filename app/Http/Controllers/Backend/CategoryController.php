<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CategoryFormRequest;

class CategoryController extends Controller{

    public function AllCategory(){

        $categories = Category::latest()->get();

        return view('backend.category.category_all',compact('categories'));

    }

    public function AddCategory(Request $request){

        return view('backend.category.category_add');

    }

    public function StoreCategory(CategoryFormRequest $request){

        
        Category::insert([

            'category_name' => $request->category_name,

            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),

        ]);

        $notification = array(

            'message' => 'Category Added Successful',

            'alert-type' => 'success'

        );

        return redirect()->route('all.category')->with($notification);

    }

    public function EditCategory($id){

        $category = Category::findOrFail($id);

        return view('backend.category.category_edit',compact('category'));

    }

    public function UpdateCategory(CategoryFormRequest $request,$id){

       

        Category::findOrFail($id)->update([

            'category_name' => $request->category_name,

            'category_slug' => strtolower(str_replace(' ','-',$request->category_name)),

        ]);

        $notification = array(

            'message' => 'Category Updated Successful',

            'alert-type' => 'success'

        );

        return redirect()->route('all.category')->with($notification);

    }

    public function DeleteCategory($id){

        Category::findOrFail($id)->delete();

        $notification = array(

            'message' => 'Category Deleted Successfuly',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

    public function GetSubCategory($category_id){

        $subcat = Subcategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();

        return json_encode($subcat);

    }

}
