<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\UserCourse;


class EnrollmentController extends Controller
{
    public function approve(User $user, Course $course)
    {
        $usercourse = UserCourse::create(
            [
                'user_id' => $user->id,
                'course_id' => $course->id,
                'course_enrolled' => 1,
                'course_completed' => 0
            ]
        );

        $usercourse->save();
        Enrollments::where('user_id', '=', $user->id)
                    ->where('course_id', '=', $course->id)
                    ->delete();
    }
}
