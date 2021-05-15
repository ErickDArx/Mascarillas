<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mascarillas extends Model
{
    use HasFactory;
    protected $table='mascarillas';

    protected $fillable = [
        'nombre', 'url',
    ];
}
