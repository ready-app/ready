<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course',
        'due_at'
    ];


    public $timestamps = true;


    protected $casts = [
        'due_at' => 'datetime:Y-m-d H:i:s'
    ];

}
