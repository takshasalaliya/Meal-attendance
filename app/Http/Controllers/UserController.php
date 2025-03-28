<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Useremail;
use App\Imports\ManuallyUser;
use App\Imports\UserExcel;
use App\Models\Qrdetail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use PDF;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Exports\ExportUser;
use Excel;

class UserController extends Controller
{
    //
    function qrcode(Request $request){
     
     $valid=Qrdetail::where('email',$request->email)->first();
       if(empty($valid)){
        $data=new Qrdetail();
        $data->name=$request->name;
        $data->mobile=$request->phone;
        $data->category=$request->category;
        $data->email=$request->email;
          $message = [
                    'name' => $request->name,
                    'email' =>$request->email,
                    
                ];
    
                $subject = "International Conference";
                $email = $request->email;
                if ($data->save()) {
                    Mail::to($email)->send(new Useremail($message, $subject));
                }
        return redirect()->back()->with('message','coupon generated successfully');
       }
        return redirect()->back()->with('message','Already register');
    }

    function excel_qrcode(Request $request){
      Excel::import(new UserExcel,$request->file('excel'));
      return redirect()->back()->with('message','Successfull Excel Upload');
    }
    function student(){
        $datas=Qrdetail::all();
        $breakfast=Qrdetail::all()->where('breakfast',!NULL)->count();
        $lunch=Qrdetail::all()->where('lunch',!NULL)->count();
      
        return view('student_list',['datas'=>$datas,'breakfast'=>$breakfast,'lunch'=>$lunch]);
    }

   
    function form($id){
      
      $data=Qrdetail::where('token',$id)->first();
      if(empty($data->id)){
        $form="remain";
      return view('form',['id'=>$id,'form'=>$form,'data'=>$data]);

      }
      if(empty($data->name)){
        $form="yes";
      return view('form',['id'=>$id,'form'=>$form,'data'=>$data]);

      }
      $form="no";
      return view('form',['id'=>$id,'form'=>$form,'data'=>$data]);
    }

    function from_submit(Request $request){
      
      $request->validate([
        'fullname' => 'required',
        'number' => 'required|min:10|max:10',
        'event' => 'required',
        'collage' => 'required',
      ]);
      $data=Qrdetail::where('token',$request->qridcode)->first();
      $data->name=$request->fullname;
      $data->mobile=$request->number;
      $data->submission=date('Y-m-d');
      $data->activity=$request->event;
      $data->collage=$request->collage;
     if($data->save()){
        return redirect()->back()->with('message','Your form is successfully submited');
     }
      return redirect()->back()->with('message','Your form is not submited');
    }
    function login(Request $request){
      $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    // return $request;
    if(Auth::attempt($credentials)){
      if(Auth::user()->role=='admin'){
        
       return redirect('/');
      }
      if(Auth::user()->role=='volunteer'){
        return redirect('/scan');
       }
    }
    else{
      return redirect()->back()->with('message','Login detail in valid');
    }
    }

    function scannerurl(Request $request){
      
      $data=Qrdetail::where('email',$request->url)->first();
      if(empty($data)){
        $detail="no";
        return view(' userdetail',['data'=>$data,'detail'=>$detail]);
      }
      $detail="yes";
      return view(' userdetail',['data'=>$data,'detail'=>$detail]);
    }


    function scanner_submit($id){
      $data=Qrdetail::where('email',$id)->first();
       $meal=User::where('role','admin')->first();
    if(empty($meal->meal)){
        return redirect('scan')->with('message', 'Admin Not Selected Meal');
    }
    $meals=$meal->meal;
      if($data->$meals==1){
        return redirect('scanner')->with('message','Already Scan');
      }
      $data->$meals=1;
      if($data->save()){
      return redirect('scanner')->with('message','Successfully');
      }
      return redirect()->back()->with('message','resubmit');
    }

    function logout(){
      Auth::logout();
      return redirect('login')->with('message','Logout Successfully');
    }

   function add_volunteer(Request $request){
    $request->validate([
      'name' => 'required',
      'email'=> 'email|required',
      'password' => 'required'
     ]);

     $data=new User();
     $data->name=$request->name;
     $data->email=$request->email;
     $data->password=$request->password;
     $data->role='volunteer';
     if($data->save()){
     return redirect()->back()->with('message','add successfully');
     }
     return redirect()->back()->with('message','Error Will Occur');

   }
   function volunteer(){
    $data=User::where('role','volunteer')->get();
    return view('add_volunteer',['datas'=>$data]);
   }

   function scannerdetail(Request $request){

    $data=Qrdetail::where('email',$request->url)->first();
      if(empty($data)){
        $detail="no";
        return view('volunteer.userdetail',['data'=>$data,'detail'=>$detail]);
      }
      $detail="yes";
      return view('volunteer.userdetail',['data'=>$data,'detail'=>$detail]);
  }


  function submit_scanner($id){
    $data=Qrdetail::where('email',$id)->first();
    $meal=User::where('role','admin')->first();
    if(empty($meal->meal)){
        return redirect('scan')->with('message', 'Admin Not Selected Meal');
    }
    $meals=$meal->meal;
      if($data->$meals==1){
       return redirect('scan')->with('message', 'Already Scanned');
      }
      $data->$meals=1;
      if($data->save()){
      return redirect('scan')->with('message','Successfully');
      }
      return redirect('scan')->with('message','resubmit');
  }

  function dowload(){
    return Excel::download(new ExportUser, 'conference.xlsx');
  }
  
  function delete($id){
    $data=Qrdetail::where('id',$id)->first();
    if($data->delete()){
        return redirect()->back()->with('message','Successfully');
    }
    return redirect()->back()->with('message','Try again after some time');
  }
  
function deleteuser($id){
    $data=User::where('id',$id)->first();
    if($data->delete()){
        return redirect()->back()->with('message','Successfully');
    }
    return redirect()->back()->with('message','Try again after some time');
  }
  
  function excel_manual(Request $request){
    Excel::import(new ManuallyUser,$request->file('excel'));
    return redirect()->back()->with('message','Successfully Excel Uplaod');
  }
   function meal_select(Request $request){
    $datas=User::where('role','admin')->get();
    foreach($datas as $data){
      $data->meal=$request->meal;
      $data->save();
    }
     return redirect()->back()->with('message','Successfully Meal Updated');
  }
}
