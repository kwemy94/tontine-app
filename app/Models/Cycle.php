<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tontines(){
        return $this->hasMany(Tontine::class);
    }
}
