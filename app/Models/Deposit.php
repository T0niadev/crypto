<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    // protected $table = "deposits";
    use HasFactory;



        // Deposit relationship with Online payments.
        public function onlinePayment()
        {
            return $this->hasOne(OnlinePayment::class);
        }
        // Deposit relationship with Investments.
        public function investment()
        {
            return $this->belongsTo(Investment::class);
        }

        // Deposit relationship with user.
        public function user()
        {
            return $this->belongsTo(User::class);
        }


}
