<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    

    protected $fillable = ['name', 'roi', 'start_date', 'type', 'slots', 'min_amount', 'max_amount', 'duration', 'duration_mode', 'description', 'image', 'status'];

     // Package relationship with investments.

     public function investments()
     {
         return $this->hasMany(Investment::class);
     }
}
