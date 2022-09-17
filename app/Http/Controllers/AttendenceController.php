<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendence;
use DB;

class AttendenceController extends Controller
{
    //
    public function takeAttendence(){
        $employees = Employee::first()->get();
        return view('attendence/take-attendence',compact('employees'));
    }


        //
        public function insertAttendence(Request $request){

           $date = $request->att_date;
           $att_date = DB::table('attendences')->where('att_date', $date)->first();
           if($att_date) {
            return Redirect()->back()->with('failed','!!--Today attendence already taken--!!');
           }else{
            foreach($request->emp_id as $id){
                $data[]=[
                "emp_id" => $id,
                "att_date" =>$request->att_date,
                "att_year"=>$request->att_year,
                "attendence" =>$request->attendence[$id],
                "month"=>$request->month,
                "edit_date"=>date("d_m_y")
                ];
           }

           $att = DB::table('attendences')->insert($data);
           if($att){
               return Redirect()->back()->with('success','Dtata Insert Successfull');
           }else{
               return Redirect()->back()->width('Data Insert Failed');
           }
           }


        }


        // all attemdence---------------
        public function allAttendence(){
           
            $all_att = Attendence::select('edit_date')->groupBy('edit_date')->get();
            return view('attendence/all-attendence',compact('all_att'));
        }


         //-----Edit Attendence
 public function editAttendence($edit_date){

    $date = Attendence::where('edit_date',$edit_date)->first();
    $data = Attendence::where('edit_date', $edit_date)->get();
    $employee = Employee::latest()->get();
    return view('attendence/edit-attendence', compact('date','data','employee'));
}



// Update Attendence-------------
public function updateAttendence(Request $request){

      foreach($request->id as $id){
      $data=[
      "att_date" =>$request->att_date,
      "att_year"=>$request->att_year,
      "attendence" =>$request->attendence[$id],
      "month"=>$request->month,
      ];
     $attendence = Attendence::where(['att_date'=>$request->att_date, 'id'=>$id])->first();
     $attendence->update($data);
      } 
 if($attendence){
     return Redirect()->route('all.attendence')->with('success','Dtata Update Successfull');
 }else{
     return Redirect()->back()->width('Data Update Failed');
 }
}
 
     //---------------------Delete Data--------------------
  public function viewAttendence($edit_date){
    $date = Attendence::where('edit_date',$edit_date)->first();
    $data = Attendence::where('edit_date', $edit_date)->get();
    $employee = Employee::latest()->get();
    return view('attendence/view-attendence', compact('date','data','employee'));
}

 
    //---------------------Delete Data--------------------
 
 
 
 
 public function monthlyAttendence(){
     //$spends = Spend::latest()->get();
     $date = date('F');
     $attendence =Attendence::where('month', $date)->get();
     return view('attendence/monthly-attendence',compact('attendence'));
 
 }

 public function januaryAttendence(){
//$spends = Spend::latest()->get();
$date="January";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));
 }



 public function februaryAttendence(){
//$spends = Spend::latest()->get();
$date="February";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));
 }



 public function marchAttendence(){
//$spends = Spend::latest()->get();
$date="March";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));
 }



 public function aprilAttendence(){
//$spends = Spend::latest()->get();
$date="April";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));
 }



 public function mayAttendence(){
//$spends = Spend::latest()->get();
$date="May";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));
 }


 public function juneAttendence(){
//$spends = Spend::latest()->get();
$date="June";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));
 }


 public function julyAttendence(){
//$spends = Spend::latest()->get();
$date="July";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));
 }


 public function augustAttendence(){
//$spends = Spend::latest()->get();
$date="August";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));
 }

   public function septemberAttendence(){
   //$spends = Spend::latest()->get();
   $date="September";
   $attendence =Attendence::where('month', $date)->get();
   $emp = Employee::latest()->get();
   return view('attendence/monthly-attendence',compact('attendence','emp'));
}


 public function octobarAttendence(){
//$spends = Spend::latest()->get();
$date="Octobar";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));
 }


 public function novembarAttendence(){
//$spends = Spend::latest()->get();
$date="Novembar";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));
 }


 public function decembarAttendence(){
//$spends = Spend::latest()->get();
$date="Decembar";
$attendence =Attendence::where('month', $date)->get();
$emp = Employee::latest()->get();
return view('attendence/monthly-attendence',compact('attendence','emp'));

 }



 
 

 
 
   
   

   
 
}
