<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['brand', 'model'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'car_user', 'car_id', 'user_id')
            ->withPivot('start_date', 'end_date')
            ->withTimestamps();
    }
}
