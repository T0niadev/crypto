<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    // protected $table = "deposits";
    use HasFactory;

    use HasFactory;


    protected $fillable = ['bankname_currency', 'accountname_ID', 'bank_wallet', 'status', 'amount'];

    protected static function boot()
    {

        parent::boot();


        self::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    // Withdrawal relationship with user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

 

}
