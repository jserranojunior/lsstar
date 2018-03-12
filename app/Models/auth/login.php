<?php

namespace App\Models\auth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class login extends Model
{
    public function Index($url){
        
        $selecImg = DB::table('users')
        ->where('email', $url)
        ->get();

        foreach($selecImg as $select){
        $url = $select->photo;
    }
    return($url);
}
}