<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suhusensor extends Model
{
    use HasFactory;
    protected $fillable = [
        'node',
        'node2'
    ];
}
