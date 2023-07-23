<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    // Relacja z klientami przypisanymi do pracownika
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    // Metoda do ustawiania hasła pracownika
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }
}
