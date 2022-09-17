<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Image;
use DB;
use Illuminate\Support\Str;

class SupplierController extends Controller
{


    public function index(){

        return view('supplier/add-supplier');

    }


// .....................Data Store...............................

    public function store(Request $request){

        $request->validate([
            'supplier_id' => 'required|unique:suppliers|max:15',
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'phone' => 'required|max:15',
            'address' => 'required',
            'city' => 'required',
            'type' => 'required',
            'photo' => 'required'
            
         ]);



         $data=array();
         $data['supplier_id']=$request->supplier_id;
         $data['name']=$request->name;
         $data['email']=$request->email;
         $data['phone']=$request->phone;
         $data['address']=$request->address;
         $data['type']=$request->type;
         $data['account_number']=$request->account_number;
         $data['account_name']=$request->account_name;
         $data['bank_name']=$request->bank_name;
         $data['branch_name']=$request->branch_name;
         $data['city']=$request->city;
         $image = $request->file('photo');

         if($image){
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'supplier/images/';
            $image_url = $upload_path.$image_full_name;
            $success  = $image->move($upload_path, $image_full_name);

            if($success){
                $data['photo'] = $image_url;
                $supplier=DB::table('suppliers')->insert($data);

                if($supplier){
                    return redirect()->back()->with('success', 'Data insert Successfuly');
                }
            }
         }
         
  
      }

      //...............all supplier................
      public function allSupplier(){
        $suppliers = supplier::latest()->get();
        return view('supplier/all-supplier', compact('suppliers'));
     }




     //..................View Supplier................
     public function viewSupplier($id){
        $single = Supplier::where('id', $id)->first();
        return view('supplier/view-supplier', compact('single'));
     }




   //----------------Edit Data--------------

   public function editSupplier($id){
    $supplier = Supplier::find($id);
    return view('supplier/edit-supplier', compact('supplier'));
}



      
  // ...Update supplier.........

  public function updateSupplier(Request $request, $id) { 

    $request->validate([
       'supplier_id' => 'required|max:15',
       'name' => 'required|max:255',
       'email' => 'required|max:255',
       'phone' => 'required|max:15',
       'address' => 'required',
       
      
    ]);
 
   $data = array();
   $data['supplier_id']=$request->supplier_id;
   $data['name']=$request->name;
   $data['email']=$request->email;
   $data['phone']=$request->phone;
   $data['address']=$request->address;
   $data['type']=$request->type;
   $data['account_number']=$request->account_number;
   $data['account_name']=$request->account_name;
   $data['bank_name']=$request->city;
   $data['branch_name']=$request->branch_name;
   $data['city']=$request->city;
 
   $image = $request->photo;
 
   if($image){
       $image_name = Str::random(20);
       $ext = strtolower($image->getClientOriginalExtension());
       $image_full_name = $image_name.'.'.$ext;
       $upload_path = 'supplier/upload/';
       $image_url = $upload_path.$image_full_name;
       $success  = $image->move($upload_path, $image_full_name);
 
       if($success){
          $data['photo'] = $image_url;
          $img =DB::table('suppliers')->where('id', $id)->first();
          $image_path = $img->photo;
          $done = unlink($image_path);
          $user=DB::table('suppliers')->where('id', $id)->update($data);
         
       
 
       if($user){
       return redirect()->route('all.supplier')->with('success', 'Data Update Successfuly');
           
       }else{
          return redirect()->back();
       }
 
      }
   }else{
           //-----Previous photo still and sent...........
          $oldphoto = $request->old_photo;
             if($oldphoto){
          $data['photo'] = $oldphoto;
          $user=DB::table('suppliers')->where('id', $id)->update($data);
 
       if($user){
       return redirect()->route('all.supplier')->with('success', 'Data Update Successfuly');
           
       }else{
          return redirect()->back();
       }
 
      }
       

   }
 
   }
 
   



     //---------------------Delete Data--------------------
     
     public function deleteSupplier($id){
        $image = Supplier::findOrfail($id);
        $photo=$image->photo;
        unlink($photo);
        Supplier::findOrfail($id)->delete();
  
        return redirect()->back()->with('delete','Delete  Successfuly');
      }




}
