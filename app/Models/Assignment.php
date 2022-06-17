<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course'
    ];


    protected $casts = [
        'due' => 'datetime:Y-m-d H:i:s'
    ];

}
