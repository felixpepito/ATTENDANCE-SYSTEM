<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // The attributes that are mass assignable.
    protected $fillable = [
        'name', 'email', 'password', 'role', 
    ];

    /**
     * Define the one-to-many relationship with the Attendance model.
     * A student can have many attendance records.
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Determine if the user is a teacher.
     */
    public function isTeacher()
    {
        return $this->role === 'teacher';
    }

    /**
     * Determine if the user is a student.
     */
    public function isStudent()
    {
        return $this->role === 'student';
    }
}
