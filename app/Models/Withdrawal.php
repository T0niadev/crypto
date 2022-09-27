<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $guarded = [];
    // protected $fillable = ['bankname_currency', 'accountname_ID', 'bank_wallet', 'status', 'amount'];

    protected static function boot()
    {

        parent::boot();


        self::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }

    // Withdrawal relationship with Online payments.
   //  public function onlinePayment()
   //  {
   //      return $this->hasOne(OnlinePayment::class);
  //   }
    // Withdrawal relationship with Investments.
   //  public function investment()
  //   {
   //      return $this->belongsTo(Investment::class);
  //   }

    // Withdrawal relationship with user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
