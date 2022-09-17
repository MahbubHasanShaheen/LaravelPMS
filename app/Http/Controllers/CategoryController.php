<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryController extends Controller
{
    //

    public function addCategory(){

        return view('category/add-category');

    }


    public function storeCategory(Request $request){
        $data = array();
       
        $data['category_name'] = $request->category_name;
        


         $category = DB::table('categories')->insert($data);
         if($category){
            return redirect()->route('all.category')->with('success', 'Data Insert Successfuly');
                
            }else{
               return redirect()->back();
            }


}


    public function allCategory(){
        $categories = Category::latest()->get();
        return view('category/all-category',compact('categories'));
     }

     //------------Edit Category--------------
     public function editCategory($id){
        $category = Category::find($id);
        return view('category/edit-category', compact('category'));
    }



    //-------------Update Category------------
    public function updateCategory(Request $request, $id) { 

        $request->validate([
           'category_name' => 'required|max:255',
         
        ]);
     
       $data = array();
       $data['category_name']=$request->category_name;    
        
       $category=DB::table('categories')->where('id', $id)->update($data);
    
      if($category){
      return redirect()->route('all.category')->with('success', 'Data Update Successfuly');
          
      }else{
         return redirect()->back();
      }
    
     }
      
    
    




// Category Delete---------------------

     public function deleteCategory($id){
        Category::findOrfail($id)->delete();
        return redirect()->back()->with('delete','Delete  Successfuly');
      }








}
