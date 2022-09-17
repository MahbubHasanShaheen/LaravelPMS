<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spend;
use DB;

class SpendController extends Controller
{
    //
    public function addSpend(){
        return view('spend/add-spend');
    }




    public function storeSpend(Request $request){
        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['month'] = $request->month;
        $data['spend_date'] = $request->spend_date;
        $data['year'] = $request->year;
        $data['created_at'] = $request->created_at;
         $spend = DB::table('spends')->insert($data);
         if($spend){
            return redirect()->route('all.spend')->with('success', 'Data Update Successfuly');
                
            }else{
               return redirect()->back();
            }


}




    public function allSpend(){
        $spends = Spend::latest()->get();
        return view('spend/all-spend',compact('spends'));
    }


    
    public function TodaySpend(){
        //$spends = Spend::latest()->get();
        $date = date('d/m/y');
        $spends =Spend::where('spend_date', $date)->get();
        return view('spend/today-spend',compact('spends'));
    
    }

    public function editTodaySpend($id){
        $today= Spend::findorFail($id);
        return view('spend/edit-today-spend',compact('today'));
    
    }


    public function updateTodaySpend(Request $request, $id){
        $request->validate([
            'details' => 'required',
            'amount' => 'required',
         ]);

        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['month'] = $request->month;
        $data['spend_date'] = $request->spend_date;
        $data['year'] = $request->year;
        

        $today=DB::table('spends')->where('id', $id)->update($data);
         
         if($today){
            return redirect()->route('today.spend')->with('success', 'Data Update Successfuly');
                
            }else{
               return redirect()->back();
            }


}

    public function MonthSpend(){
        //$spends = Spend::latest()->get();
        $date = date('F');
        $spends =Spend::where('month', $date)->get();
        return view('spend/month-spend',compact('spends'));
    
    }


    // Edit Month Spend---------------------//
    public function editMonthSpend($id){
        $month= Spend::findorFail($id);
        return view('spend/edit-month-spend',compact('month'));
    
    }


    public function updateMonthSpend(Request $request, $id){
        $request->validate([
            'details' => 'required',
            'amount' => 'required',
         ]);

        $data = array();
        $data['details'] = $request->details;
        $data['amount'] = $request->amount;
        $data['month'] = $request->month;
        $data['spend_date'] = $request->spend_date;
        $data['year'] = $request->year;
        

        $month=DB::table('spends')->where('id', $id)->update($data);
         
         if($month){
            return redirect()->route('month.spend')->with('success', 'Data Update Successfuly');
                
            }else{
               return redirect()->back();
            }


}


public function YearSpend(){
    //$spends = Spend::latest()->get();
    $date = date('Y');
    $spends =Spend::where('year', $date)->get();
    return view('spend/year-spend',compact('spends'));

}


// Edit Month Spend---------------------//
public function editYearSpend($id){
    $year= Spend::findorFail($id);
    return view('spend/edit-year-spend',compact('year'));

}


public function updateYearSpend(Request $request, $id){
    $request->validate([
        'details' => 'required',
        'amount' => 'required',
     ]);

    $data = array();
    $data['details'] = $request->details;
    $data['amount'] = $request->amount;
    $data['month'] = $request->month;
    $data['spend_date'] = $request->spend_date;
    $data['year'] = $request->year;
    

    $year=DB::table('spends')->where('id', $id)->update($data);
     
     if($year){
        return redirect()->route('year.spend')->with('success', 'Data Update Successfuly');
            
        }else{
           return redirect()->back();
        }

}

// Month Spend------------------
public function JanuarySpend(){
    //$spends = Spend::latest()->get();
    $date="January";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}
public function FebruarySpend(){
    //$spends = Spend::latest()->get();
    $date="February";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}
public function MarchSpend(){
    //$spends = Spend::latest()->get();
    $date="March";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}
public function AprilSpend(){
    //$spends = Spend::latest()->get();
    $date="April";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}
public function MaySpend(){
    //$spends = Spend::latest()->get();
    $date="May";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}
public function JuneSpend(){
    //$spends = Spend::latest()->get();
    $date="June";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}
public function JulySpend(){
    //$spends = Spend::latest()->get();
    $date="July";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}


public function AugustSpend(){
    //$spends = Spend::latest()->get();
    $date="August";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend', compact('spends'));

   }
   public function SeptembarSpend(){
    //$spends = Spend::latest()->get();
    $date="Septembar";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}
public function OctoberSpend(){
    //$spends = Spend::latest()->get();
    $date="October";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}
public function NovembarSpend(){
    //$spends = Spend::latest()->get();
    $date="November";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}



public function DecemberSpend(){
    //$spends = Spend::latest()->get();
    $date="December";
    $spends =Spend::where('month', $date)->get();
    return view('spend/month-spend',compact('spends'));

}



}
