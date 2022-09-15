<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{

    // protected $fillable = ['amount', 'total_return', 'start_date', 'withdrawal_date',  'inv_user', 'slots', 'user_id', 'package_id', 'status'];
    protected $guarded = [];



    protected static function boot()
    {

        parent::boot();


        self::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }



    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    // Investments relationships with transactions.
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    // Investments relationships with online payments.
    public function onlinePayment()
    {
        return $this->hasOne(OnlinePayment::class);
    }
    // Investments relationship with user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
