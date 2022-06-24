<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'instructor'
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }


}
