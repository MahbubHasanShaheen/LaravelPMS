<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection\strtotime;
use Illuminate\Http\Request;
use App\Models\Advanced_salary;
use App\Models\Salary;
use App\Models\Employee;
use DB;
class SalaryController extends Controller
{
    //----------add salary-----------
    
    public function addAdvancedSalary(){

        return view('salary/add-advanced-salary');

    }


    //-------all salary------------


    public function storeAdvancedSalary(Request $request){
            $data = array();
            $data['employee_id'] = $request->employee_id;
            $data['month'] = $request->month;
            $data['year'] = $request->year;
            $data['advanced_salary'] = $request->advanced_salary;


             $advanced = DB::table('advanced_salaries')->insert($data);
             if($advanced){
                return redirect()->route('all.advanced.salary')->with('success', 'Data Update Successfuly');
                    
                }else{
                   return redirect()->back();
                }


    }




     public function allAdvancedSalary(){
        $advanced_salaries = Advanced_salary::latest()->get();
        $employee = Employee::latest()->get();
       
        return view('salary/all-advanced-salary', compact('advanced_salaries','employee'));

    }



//------------Pay Salary Route-----------//

public function paySalary(){
    
   // $month = date("F", strtotime('-1 month'));
   
    //$salary = Advanced_salary::where('month', $month)->get();
    //$employee = Employee::latest()->get();
    //return view('salary/pay-salary', compact('salary','employee'));


   // return view('salary/pay-salary');
  $employee = Employee::latest()->get();
   return view('salary/pay-salary', compact('employee'));

}






}
