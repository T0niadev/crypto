<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    // Withdrawal relationship with Online payments.
    public function onlinePayment()
    {
        return $this->hasOne(OnlinePayment::class);
    }
    // Withdrawal relationship with Investments.
    public function investment()
    {
        return $this->belongsTo(Investment::class);
    }

    // Withdrawal relationship with user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
