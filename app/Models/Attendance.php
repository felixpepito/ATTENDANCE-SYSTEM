<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'student_id', 'date', 'status', // You can add any additional fields
    ];

    /**
     * Define the inverse of the relationship - an attendance record belongs to a student (user).
     */
    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
