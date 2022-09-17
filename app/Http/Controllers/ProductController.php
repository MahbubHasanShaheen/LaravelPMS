<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use DB;
use Image;
use Str;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;





class ProductController extends Controller
{
    //
    
    public function addProduct(){

        return view('product/add-product');

    }

    // Store Product-------------

    
    public function storeProduct(Request $request){

        $request->validate([
            'product_name' => 'required|max:255',
            'brand' => 'required|max:255',
            'product_code' => 'required|max:15',
            'product_qty' => 'required',
            'waranty' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            
         ]);


         $data = array();
         $data['product_name']=$request->product_name;
         $data['cat_id']=$request->cat_id;
         $data['sup_id']=$request->sup_id;
         $data['brand']=$request->brand;
         $data['product_code']=$request->product_code;
         $data['waranty']=$request->waranty;
         $data['product_qty']=$request->product_qty;
         $data['product_garage']=$request->product_garage;
         $data['product_route']=$request->product_route;
         $data['purchase_date']=$request->purchase_date;
         $data['expire_date']=$request->expire_date;
         $data['purchase_price']=$request->purchase_price;
         $data['selling_price']=$request->selling_price;
         $data['status']=$request->status;
         $image = $request->file('product_image');

         if($image){
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'product/images/';
            $image_url = $upload_path.$image_full_name;
            $success  = $image->move($upload_path, $image_full_name);

            if($success){
                $data['product_image'] = $image_url;
                $product=DB::table('products')->insert($data);

                if($product){
                    return redirect()->back()->with('success', 'Data insert Successfuly');
                }
            }
         }
         
  
      }

  


      //-all product-----------
      public function allProduct(){
        $products = Product::latest()->get();
         return view('product/all-product', compact('products'));
      }


 //-----Edit Product
 public function editProduct($id){
        $product = Product::findorFail($id);
        $categories = Category::latest()->get();
        $suppliers = Supplier::latest()->get();
        return view('product/edit-product', compact('product','categories','suppliers'));
}
        
  // ...Update product.........

 public function updateProduct(Request $request, $id) { 

    $request->validate([
       'product_name' => 'required|max:255',
       'brand' => 'required|max:255',
       'product_code' => 'required|max:15',
       'product_qty' => 'required',
       'waranty' => 'required',
       'purchase_price' => 'required',
       'selling_price' => 'required',

       
       
    ]);
 
   $data = array();
   $data['product_name']=$request->product_name;
   $data['cat_id']=$request->cat_id;
   $data['sup_id']=$request->sup_id;
   $data['brand']=$request->brand;
   $data['product_code']=$request->product_code;
   $data['waranty']=$request->waranty;
   $data['product_qty']=$request->product_qty;
   $data['product_garage']=$request->product_garage;
   $data['product_route']=$request->product_route;
   $data['purchase_date']=$request->purchase_date;
   $data['expire_date']=$request->expire_date;
   $data['purchase_price']=$request->purchase_price;
   $data['selling_price']=$request->selling_price;
   //$data['status']=$request->status;
   $image = $request->produt_image;
 
   if($image){
       $image_name = Str::random(20);
       $ext = strtolower($image->getClientOriginalExtension());
       $image_full_name = $image_name.'.'.$ext;
       $upload_path = 'product/images/';
       $image_url = $upload_path.$image_full_name;
       $success  = $image->move($upload_path, $image_full_name);
 
       if($success){
          $data['produt_image'] = $image_url;
          $img =DB::table('products')->where('id', $id)->first();
          $image_path = $img->produt_image;
          $done = unlink($image_path);
          $product=DB::table('products')->where('id', $id)->update($data);
 
       if($product){
       return redirect()->route('all.product')->with('success', 'Data Update Successfuly');
           
       }else{
          return redirect()->back();
       }
      }
   
   }else{
      //-----Previous photo still and sent...........
     $oldimage = $request->old_image;
        if($oldimage){
     $data['product_image'] = $oldimage;
     $product=DB::table('products')->where('id', $id)->update($data);

  if($product){
  return redirect()->route('all.product')->with('success', 'Data Update Successfuly');
      
  }else{
     return redirect()->back();
  }

 }
  

}
 
   }

   

//-----------View Product-----------------

public function viewProduct($id){
   $single = Product::where('id', $id)->first();
   $single2 = Category::where('id', $id)->first();
   $single3 = Supplier::where('id', $id)->first();
   return view('product/view-product', compact('single','single2','single3'));
}

   
     //---------------------Delete Product-------------------
     
     public function deleteProduct($id){
      $image = Product::findOrfail($id);
      $photo=$image->product_image;
      unlink($photo);
      Product::findOrfail($id)->delete();
      return redirect()->back()->with('delete','Delete  Successfuly');
    }



   // --------------Status Product-----------------
   public function inactiveProduct($id){
      Product::find($id)->update(['status' => 0]);
      return redirect()->back()->with('update', 'Product Inactive Successfuly');
    }
    
    public function activeProduct($id){
      Product::find($id)->update(['status' => 1]);
      return redirect()->back()->with('update', 'Product Active Successfuly');
    }




    // Product import and export...............
    public function importProduct(){
      return view('product/import-product');
    }

  public function export(){
        
  }

  
}
