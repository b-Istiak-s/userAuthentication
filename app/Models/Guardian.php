<?php

namespace App\Models;

use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    public function child(){
        return $this-> hasMany(Child::class);
    }
}
