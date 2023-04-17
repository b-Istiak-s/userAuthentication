<?php

namespace App\Models;

use App\Models\Guardian;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    public function child(){
        return $this-> belongsTo(Guardian::class);
    }
}
