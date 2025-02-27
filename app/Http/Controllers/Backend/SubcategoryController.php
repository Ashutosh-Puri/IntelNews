<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;
use App\Http\Requests\Backend\SubCategoryFormRequest;

class SubcategoryController extends Controller{

    public function AllSubCategory(){

        $subcategories = Subcategory::latest()->get();

        return view('backend.subcategory.subcategory_all',compact('subcategories'));

    }


    public function AddSubCategory(){

        // JOIN DATA TO CATEGORIES

        $categories = Category::latest()->get();

        return view('backend.subcategory.subcategory_add',compact('categories'));

    }

    public function StoreSubCategory(SubCategoryFormRequest $request){

        Subcategory::insert([

            'category_id' => $request->category_name,

            'subcategory_name' => $request->subcategory_name,

            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),

        ]);

        $notification = array(

            'message' => 'Sub Category Added Successful',

            'alert-type' => 'success'

        );

        return redirect()->route('all.sub.category')->with($notification);

    }

    public function EditSubCategory($id){

        // JOIN DATA TO CATEGORIES

        $categories = Category::latest()->get();

        $subcategory = Subcategory::findOrFail($id);

        return view('backend.subcategory.subcategory_edit',compact('subcategory','categories'));

    }


    public function UpdateSubCategory(SubCategoryFormRequest $request,$id){

        Subcategory::findOrFail($id)->update([

            'category_id' => $request->category_name,

            'subcategory_name' => $request->subcategory_name,

            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),

        ]);

        $notification = array(

            'message' => 'Sub Category Updated Successful',

            'alert-type' => 'success'

        );

        return redirect()->route('all.sub.category')->with($notification);

    }

    public function DeleteSubCategory($id){

        Subcategory::findOrFail($id)->delete();

        $notification = array(

            'message' => 'Sub Category Deleted Successful',

            'alert-type' => 'success'

        );

        return redirect()->back()->with($notification);

    }

}
