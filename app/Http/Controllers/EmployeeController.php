<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Image;
use DB;
use Illuminate\Support\Str;


class EmployeeController extends Controller
{
    public function addEmployee(){
       return view('employee/add-employee');
    }


    public function store(Request $request){
      $request->validate([
         'name' => 'required|max:255',
         'email' => 'required|unique:employees|max:255',
         'phone' => 'required|max:15',
         'nid_no' => 'required',
         'address' => 'required',
         'salary' => 'required',
         'photo' => 'required|mimes:jpg,jpeg,png,gif'
         
      ]);

      $photo = $request->file('photo');
      $name_gen=hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
      Image::make($photo)->resize(240,240)->save('employee/upload/'. $name_gen);
      $img_url = 'employee/upload/'.$name_gen;

      Employee::insert([
         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'nid_no' => $request->nid_no,
         'address' => $request->address,
         'experience' => $request->experience,
         'salary' => $request->salary,
         'vacation'=> $request->vacation,
         'city' => $request->city,
         'photo' => $img_url,
         
           
      ]);

      return redirect()->back()->with('success', 'Data insert Successfuly');
}



   public function allEmployee(){
        $employees = Employee::latest()->get();
        return view('employee/all-employee', compact('employees'));
     }


   public function viewEmployee($id){
      $single = Employee::where('id', $id)->first();
      return view('employee/view-employee', compact('single'));
   }


   public function editEmployee($id){
      $employee = Employee::find($id);
      return view('employee/edit-employee', compact('employee'));
  }




  // ...Update Product.........

  public function updateEmployee(Request $request, $id) { 

   $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|max:255',
      'phone' => 'required|max:15',
      'nid_no' => 'required',
      'address' => 'required',
      'salary' => 'required',
      
      
   ]);

  $data = array();
  $data['name']=$request->name;
  $data['email']=$request->email;
  $data['phone']=$request->phone;
  $data['nid_no']=$request->nid_no;
  $data['address']=$request->address;
  $data['experience']=$request->experience;
  $data['salary']=$request->salary;
  $data['vacation']=$request->vacation;
  $data['city']=$request->city;
  $data['name']=$request->name;

  $image = $request->photo;

  if($image){
      $image_name = Str::random(20);
      $ext = strtolower($image->getClientOriginalExtension());
      $image_full_name = $image_name.'.'.$ext;
      $upload_path = 'public/employee/upload/';
      $image_url = $upload_path.$image_full_name;
      $success  = $image->move($upload_path, $image_full_name);

      if($success){
         $data['photo'] = $image_url;
         $img =DB::table('employees')->where('id', $id)->first();
         $image_path = $img->photo;
         $done = unlink($image_path);
         $user=DB::table('employees')->where('id', $id)->update($data);

      

      if($user){
      return redirect()->route('all.employee')->with('success', 'Data Update Successfuly');
          
      }else{
         return redirect()->back();
      }
      }
  
  }else{
   //-----Previous photo still and sent...........
  $oldphoto = $request->old_photo;
     if($oldphoto){
  $data['photo'] = $oldphoto;
  $user=DB::table('employees')->where('id', $id)->update($data);

if($user){
return redirect()->route('all.employee')->with('success', 'Data Update Successfuly');
   
}else{
  return redirect()->back();
}

}


}



  }



     public function deleteEmployee($id){
      $image = Employee::findOrfail($id);
      $photo=$image->photo;
      unlink($photo);
      Employee::findOrfail($id)->delete();

      return redirect()->back()->with('delete','Delete  Successfuly');
    }








}
