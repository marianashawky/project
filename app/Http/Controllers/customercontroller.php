<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use Illuminate\Support\Facades\Auth;

class customercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return  view('form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request)
    {
       $data=     $request->validate([
            'name' => ['required', 'string', 'min:5' ,'max:50' ],
            'email' => ['required', 'string', 'min:0' ,'max:100' ],
            'phone' => ['required', 'string', 'min:0' ,'max:12' ],

            'password' => ['required', 'min:5' ,'max:50' ],

        ]
    
    );
        $data['password']=bcrypt( $data['password']);

  
  
        $res=  customer::create(['name'=>$data['name'],'phone'=>$data['phone'],'email'=>$data['email'],'password'=>$data['password']]);

        $message='';
    if($res){

      $message='success';
    }else{

      $message='error';

    }

    return  view('form',['message'=>$message]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    $data= customer::paginate(3);

   return view('display',['data'=>$data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    $data=customer::find($id);

    return view('showuser', ['data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //


        $data=     $request->validate(
            [
          'name' => ['required', 'string', 'min:5' ,'max:50' ],
          'email' => ['required', 'string', 'min:0' ,'max:100' ],
          'phone' => ['required', 'string', 'min:0' ,'max:12' ],
  
  
      ]
        );
  
  
  
        $op=  customer::where('id',$request->id)->update(['name'=> $request->name,'phone'=> $request->phone,'email'=> $request->email]);
  
  
        if($op){
          return  redirect('/customer/show');
     
         }else{
     
             echo 'error edit';
         }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $op= customer::where('id',$id)->delete();

        if($op){
         return  back();
    
        }else{
    
            echo 'error delete';
        }


    }


 public function signin(){

        return  view ('login');

    }

    public function login(Request  $request){


          $data=$request->validate([
            'email' => ['required', 'string', 'min:0' ,'max:100' ],
            'password' => ['required', 'min:5' ,'max:50' ],

        ]
    
    );

   if( Auth::attempt($data,true))
   


   {
    return  redirect(url('/customer/show'));

   }else{


    return  redirect(url('signin'));

   }
   
   ;

    }

    
    public function logout(){


        Auth::logout();
        return  redirect (url('signin'));

    }



}
