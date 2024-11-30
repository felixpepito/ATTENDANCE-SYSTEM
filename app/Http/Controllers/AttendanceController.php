<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Mark attendance for a student.
     */
    public function markAttendance(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:users,id',
            'status' => 'required|in:present,absent',
        ]);

        $attendance = new Attendance();
        $attendance->student_id = $request->student_id;
        $attendance->date = Carbon::today();
        $attendance->status = $request->status;
        $attendance->save();

        return response()->json(['message' => 'Attendance marked successfully']);
    }

    /**
     * Get all attendance records for a student.
     */
    public function getAttendance(Request $request, $studentId)
    {
        $student = User::findOrFail($studentId);
        $attendances = $student->attendances()->get();

        return response()->json($attendances);
    }

    /**
     * Get attendance for a specific date.
     */
    public function getAttendanceForDate(Request $request, $studentId, $date)
    {
        $student = User::findOrFail($studentId);
        $attendance = $student->attendances()->where('date', $date)->first();

        if (!$attendance) {
            return response()->json(['message' => 'No attendance record found for this date'], 404);
        }

        return response()->json($attendance);
    }

    /**
     * Get all attendance records for all students.
     */
    public function getAllAttendances()
    {
        $attendances = Attendance::all();

        return response()->json($attendances);
    }
}
