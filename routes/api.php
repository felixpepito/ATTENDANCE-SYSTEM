<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('attendance/mark', [AttendanceController::class, 'markAttendance']);  // Mark attendance
    Route::get('attendance/{studentId}', [AttendanceController::class, 'getAttendance']);  // Get all attendance for a student
    Route::get('attendance/{studentId}/{date}', [AttendanceController::class, 'getAttendanceForDate']);  // Get attendance for specific date
    Route::get('attendance/all', [AttendanceController::class, 'getAllAttendances']);  // Get all attendance records
});