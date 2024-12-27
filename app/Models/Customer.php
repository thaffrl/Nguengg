<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // Tambahkan properti $fillable untuk mengizinkan kolom diisi secara mass-assignment
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'age',
        'car_id',
        'ktp',
        'rentalDate',
        'returnDate',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
