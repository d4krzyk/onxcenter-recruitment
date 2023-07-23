<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['product', 'amount', 'client_id', 'employee_id'];

    // Relacja do klienta, który złożył to zamówienie
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Relacja do pracownika, który obsłużył to zamówienie
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
