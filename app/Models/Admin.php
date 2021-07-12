<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Model
{
    protected $fillable = ['name','password'];
    
    public static function store($request)
    {
        $item = new Admin();
        
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = Hash::make($request->password);

        return $item->save(); // true/false;         
    } 
}
