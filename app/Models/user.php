<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class user extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function get_signup($user_name, $password, $mob,$image_Name){
        $sql = "INSERT INTO `users`(`uname`, `password`, `mob`,`profile`) VALUES ('$user_name','$password','$mob','$image_Name') ";
        $rResult = DB::select(DB::raw($sql));
        return $rResult;
    }

    public static function get_login($user_name, $password){

    
    
        $sql = DB::select("SELECT count(id) as user_match FROM `users` WHERE uname='$user_name'");
        if ($sql[0]->user_match == 1){
            $sql_ = "SELECT count(id) as login_count FROM  `users` WHERE uname = '$user_name' and password='$password'";
            
            $returnSQL = DB::select( DB::raw($sql_));    
            if ($returnSQL[0]->login_count == 0){
                return 0;
            }
            elseif ($returnSQL[0]->login_count == 1){
                $sql = "SELECT * FROM `users` WHERE uname='$user_name'";
                $rsql = DB::select( DB::raw($sql));
                return $rsql;
            }
        }else{
            // echo "invalid user name";
            return -1;
        }

        
        

        
    }

    public static function get_all_data(){
        $sql = ("SELECT * FROM `users`");
        $returnSQL1 = DB::select(DB::raw($sql));
        return $returnSQL1;
    }
}
