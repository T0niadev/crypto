<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
    // Users relationships with wallets
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }
    // Users relationships with transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    // Users relationships with Bank Accounts.
    public function bankAccounts()
    {
        return $this->hasMany(BankAccount::class);
    }
    // Users relationships with Documents.
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function payments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PaypalPayment::class);
    }

    public function getFulNameAttribute()
    {
        return $this->first_name . ' ' .$this->last_name;
    }
}
