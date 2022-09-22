<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $guarded = [];

  //  protected $fillable = ['name', 'roi', 'start_date', 'type', 'slots', 'min_amount', 'max_amount', 'duration', 'duration_mode', 'description', 'image', 'status'];

    // Package relationship with investments.

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }

    public function hasStarted()
    {
        return Carbon::parse($this->start_date)->gt(Carbon::now());
    }

    public function canRunInvestment()
    {
        return $this->status == 'open' || (!$this->hasStarted());
    }
}