<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tontine;
use App\Models\User;

// class User_Tontine extends Model
// {
//     use HasFactory;
//     protected $fillable =[
//         'user_id',
//         'tontine_id'
//     ];

// }

class User extends Model
{
    public function tontine()
    {
        $this->belongsToMany(Tontine::class);
    }
}

class Tontine extends Model
{
    public function user()
    {
        $this->belongsToMany(User::class);
    }
}
