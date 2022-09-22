<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $fillable = ['document_type', 'image', 'user_id', 'status'];

    protected static function boot()
    {

        parent::boot();


        self::creating(function ($model) {
            $model->user_id = auth()->id();
        });
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
