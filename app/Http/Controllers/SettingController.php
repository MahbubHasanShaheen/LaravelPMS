<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use DB;
use Str;
use Image;

class SettingController extends Controller
{
    //

    public function addSetting(){

        return view('setting/add-setting');

    }

    public function store(Request $request){

        $request->validate([
            'company_name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:15',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'zipcode' => 'required'
            
         ]);



         $data=array();
         $data['company_name']=$request->company_name;
         $data['email']=$request->email;
         $data['phone']=$request->phone;
         $data['address']=$request->address;
         $data['city']=$request->city;
         $data['country']=$request->country;
         $data['zipcode']=$request->zipcode;

         $image = $request->file('logo');

         if($image){
            $image_name = Str::random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/company/images/';
            $image_url = $upload_path.$image_full_name;
            $success  = $image->move($upload_path, $image_full_name);

            if($success){
                $data['logo'] = $image_url;
                $setting=DB::table('settings')->insert($data);

                if($setting){
                    return redirect()->back()->with('success', 'Data insert Successfuly');
                }
            }
         }
         
  
      }




    public function allSetting(){
        $setting = Setting::latest()->get();
        return view('setting/all-setting',compact('setting'));
     }


        public function viewSetting($id){
        $setting = Setting::where('id', $id)->first();
        return view('setting/view-setting', compact('setting'));
     }

     //------------Edit Category--------------
     public function editSetting($id){
        $setting = Setting::find($id);
        return view('setting/edit-setting', compact('setting'));
    }



    //-------------Update Category------------


  public function updateSetting(Request $request, $id) { 

    $request->validate([
       'company_name' => 'required|max:255',
       'email' => 'required|max:255',
       'phone' => 'required|max:15',
       'address' => 'required',
       'city' => 'required',
       'country' => 'required',
       
       
    ]);
 
   $data = array();
   $data['company_name']=$request->company_name;
   $data['logo']=$request->logo;
   $data['email']=$request->email;
   $data['phone']=$request->phone;
   $data['address']=$request->address;
   $data['city']=$request->city;
   $data['country']=$request->country;
   $data['zipcode']=$request->zipcode;
 
   $image = $request->logo;
 
   if($image){
       $image_name = Str::random(20);
       $ext = strtolower($image->getClientOriginalExtension());
       $image_full_name = $image_name.'.'.$ext;
       $upload_path = 'public/company/image/';
       $image_url = $upload_path.$image_full_name;
       $success  = $image->move($upload_path, $image_full_name);
 
       if($success){
          $data['logo'] = $image_url;
          $img =DB::table('settings')->where('id', $id)->first();
          $image_path = $img->logo;
          $done = unlink($image_path);
          $setting=DB::table('settings')->where('id', $id)->update($data);
 
       
 
       if($setting){
       return redirect()->back()->with('success', 'Data Update Successfuly');
           
       }else{
          return redirect()->back();
       }
      }
   
   }else{
      //-----Previous photo still and sent...........
     $oldphoto = $request->old_photo;
        if($oldphoto){
     $data['logo'] = $oldphoto;
     $user=DB::table('settings')->where('id', $id)->update($data);

  if($user){
  return redirect()->back()->with('success', 'Data Update Successfuly');
      
  }else{
     return redirect()->back();
  }

 }
  

}
 
 
 
   }






}
