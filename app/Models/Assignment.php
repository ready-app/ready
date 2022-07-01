<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model {
    use HasFactory;

    protected $fillable = [
        'course_id',
        'name',
        'due_at'
    ];

    protected $casts = [
        'due_at' => 'datetime:Y-m-d H:i:s'
    ];

    public function course() {
        return $this->belongsTo(Course::class);
    }
}
