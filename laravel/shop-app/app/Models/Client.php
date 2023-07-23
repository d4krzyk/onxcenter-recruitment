<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class Client extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email' , 'employee_id'];

    // Relacja do pracownika, który jest przypisany do klienta
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    // Relacja do zamówień klienta
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    // Metoda do ustawiania hasła klienta
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
