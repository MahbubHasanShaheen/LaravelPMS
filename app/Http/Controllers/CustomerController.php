<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Image;
use DB;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    //-----------------Customer--------------
    public function index(){

        return view('customer/add-customer');

    }



    
    public function store(Request $request){

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'phone' => 'required|max:15',
            'address' => 'required',
            'city' => 'required',
            'shopname' => 'required',
            'photo' => 'required'
            
         ]);



         $data=array();
         $data['name']=$request->name;
         $data['email']=$request->email;
         $data['phone']=$request->phone;
         $data['address']=$request->address;
         $data['city']=$request->city;
         $data['shopname']=$request->shopname;
         $data['banck_account']=$request->banck_account;
         $data['account_name']=$request->account_name;
         $data['bank_name']=$request->bank_name;
         $data['branch_name']=$request->branch_name;

         $image = $request->file('photo');

         if($image){
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/customer/images/';
            $image_url = $upload_path.$image_full_name;
            $success  = $image->move($upload_path, $image_full_name);

            if($success){
                $data['photo'] = $image_url;
                $customer=DB::table('customers')->insert($data);

                if($customer){
                    return redirect()->back()->with('success', 'Data insert Successfuly');
                }
            }
         }
         
  
      }


        
    
   public function allCustomer(){
      $customers = Customer::latest()->get();
      return view('customer/all-customer', compact('customers'));
   }



      public function viewCustomer($id){
        $single = Customer::where('id', $id)->first();
        return view('customer/view-customer', compact('single'));
     }



     public function editCustomer($id){
        $customer = Customer::find($id);
        return view('customer/edit-customer', compact('customer'));
    }




    
  // ...Update Customer.........

  public function updateCustomer(Request $request, $id) { 

    $request->validate([
       'name' => 'required|max:255',
       'email' => 'required|max:255',
       'phone' => 'required|max:15',
       'address' => 'required',
       'city' => 'required',
       'shopname' => 'required',
       
       
    ]);
 
   $data = array();
   $data['name']=$request->name;
   $data['email']=$request->email;
   $data['phone']=$request->phone;
   $data['address']=$request->address;
   $data['city']=$request->city;
   $data['shopname']=$request->shopname;
   $data['banck_account']=$request->banck_account;
   $data['account_name']=$request->account_name;
   $data['bank_name']=$request->city;
   $data['branch_name']=$request->branch_name;
 
   $image = $request->photo;
 
   if($image){
       $image_name = Str::random(20);
       $ext = strtolower($image->getClientOriginalExtension());
       $image_full_name = $image_name.'.'.$ext;
       $upload_path = 'public/customer/upload/';
       $image_url = $upload_path.$image_full_name;
       $success  = $image->move($upload_path, $image_full_name);
 
       if($success){
          $data['photo'] = $image_url;
          $img =DB::table('customers')->where('id', $id)->first();
          $image_path = $img->photo;
          $done = unlink($image_path);
          $user=DB::table('customers')->where('id', $id)->update($data);
 
       
 
       if($user){
       return redirect()->route('all.customer')->with('success', 'Data Update Successfuly');
           
       }else{
          return redirect()->back();
       }
      }
   
   }else{
      //-----Previous photo still and sent...........
     $oldphoto = $request->old_photo;
        if($oldphoto){
     $data['photo'] = $oldphoto;
     $user=DB::table('customers')->where('id', $id)->update($data);

  if($user){
  return redirect()->route('all.customer')->with('success', 'Data Update Successfuly');
      
  }else{
     return redirect()->back();
  }

 }
  

}
 
 
 
   }
 




      public function deleteCustomer($id){
        $image = Customer::findOrfail($id);
        $photo=$image->photo;
        unlink($photo);
        Customer::findOrfail($id)->delete();
  
        return redirect()->back()->with('delete','Delete  Successfuly');
      }




}
