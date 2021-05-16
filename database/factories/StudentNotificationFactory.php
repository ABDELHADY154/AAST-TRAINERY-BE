<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\InternshipPost;
use App\Session;
use App\Student;
use App\StudentNotification;
use Faker\Generator as Faker;

$factory->define(StudentNotification::class, function (Faker $faker) {

    $categoryArr = ["success", "rejected", "important"];
    $typeArr = ["session", "internship"];
    $type = $typeArr[rand(0, 1)];
    $category = $categoryArr[rand(0, 2)];
    $successMessage = [
        "Congratulations you got accepted in the applied internship",
        "Your session has been booked successfully",

    ];
    $importantMessage = [
        "Review your finished intenship",
        "You have a recomendation to apply for an internship", "Review your finished session",
    ];
    $rejectedMessage = [
        "Unfortunately, you were rejected in the applied internship",
        "Unfortunately, you were rejected in the booked session"
    ];
    if ($type == "session") {
        $sessionId = rand(1, Session::all()->count());
        $internId = null;
        if ($category == "success") {
            $message = $successMessage[1];
        } elseif ($category == "rejected") {
            $message = $rejectedMessage[1];
        } elseif ($category == "important") {
            $message = $importantMessage[2];
        }
    } elseif ($type == "internship") {
        $sessionId = null;
        $internId =  rand(1, InternshipPost::all()->count());
        if ($category == "success") {
            $message = $successMessage[0];
        } elseif ($category == "rejected") {
            $message = $rejectedMessage[0];
        } elseif ($category == "important") {
            $message = $importantMessage[rand(0, 1)];
        }
    }

    return [
        'student_id' => rand(1, Student::all()->count()),
        'session_id' => $sessionId,
        'internship_post_id' => $internId,
        'category' => $category,
        'message' => $message,
        'type' => $type,
        'seen' => false
    ];
});
