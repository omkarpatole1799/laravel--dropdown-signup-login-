<?php

namespace App\Http\Controllers;

use App\Models\language;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class userController extends Controller
{
    //
    function login(Request $request){
        
        $user_name = $request->user_name;
        $password = $request->password;

        if(!empty($user_name)&& !empty($password)){
            $data['login'] = user::get_login($user_name, $password);
            // dd($data);
            
            if($data['login'] == 0){
                // session()->flash('user_name',$username);
                session()->flash('error','invalid password');
                // session()->flash('mobile',$mob);
                return redirect("login"); 
            }
            elseif($data['login'] == -1){
                session()->flash('error','User not exsist');
                return redirect('login');
            }else{

                return view('user_welcome',$data);
            }
        }

        

    }

    function signup(Request $request) {

        //validation
        // $request->validate([
        //     'user_name'=>'required|min:2|max:20',
        //     'password'=>'required|min:8|max:20',
        //     'mobile'=>'required|min:10|max:10'          
            
        // ]);  

        //getting data from form and store into variable
        $user_name = $request->user_name;
        $password = $request->password;
        $mob = $request->mobile;


        $request->validate([
            'image.*' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destination_path = 'public/images';
            $image_Name = $image->getClientOriginalName();
            $path = $image->move($destination_path,$image_Name);
        }

        // $get_image=$request->file('image')->store('img');
        // dd($get_image);
            // dd($req1);
        //first check if user exsist
        if(!empty($user_name) && !empty($password) && !empty($mob)){
            $data = user::get_login($user_name, $password);
            if($data == 1){
                session()->flash('user_name','User exsist');
                session()->flash('password',$password);
                session()->flash('mobile',$mob);
                return redirect("signup");
            }else{
                user::get_signup($user_name, $password, $mob,$image_Name);
                return redirect('login');
            }
        }
        else{
            return redirect("signup");
        }

    }



    function view_all_db(Request $request){
        $data = user::get_all_data();
        return view("view_db",['members'=>$data]);
    }




    function dropdown_menu(Request $req){
        // $data = language::all();
        $data['country']= DB::select("SELECT * FROM `tbl_countries`");
        
        // echo "hi";
        return view('dropdown',$data);
        
        // dd($data);
    }
    function ajax(Request $req){
        $country_id = $req->country;
        $states=DB::select("SELECT * FROM `tbl_states` WHERE country_id=(SELECT id FROM tbl_countries WHERE id= $country_id)");
        $html='<option value="Select State">--Select State--</option>';
        foreach($states as $list){
            $html.= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }

        echo $html;
    }
    
    function ajax_city(Request $req){
        $state_id = $req->city;
        $cities = DB::select("SELECT * FROM `tbl_cities` WHERE state_id=(SELECT id FROM tbl_states WHERE id = $state_id)");
        // dd($cities);
        // echo "SELECT * FROM `tbl_cities` WHERE state_id=(SELECT id FROM tbl_states WHERE id = $state_id)";

        $html='<option value="Select City">--Select City--</option>';

        foreach($cities as $list){
            $html.= '<option value="'.$list->id.'">'.$list->name.'</option>';
        }
        echo $html;    
    }

}
