<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;

class StudentSubscribeController extends Controller
{
    use CoreJsonResponse;

    public function subscribe()
    {
        $student = Student::where('id', auth('api')->id())->first();
        if ($student) {
            if ($student->subscribe == false) {
                $student->update([
                    'subscribe' => true,
                ]);
                $student->save();
                return $this->ok(['student subscribed successfully']);
            } else {
                return $this->forbidden(['student already subscribed']);
            }
        } else {
            return $this->notFound(['student not found']);
        }
    }

    public function unSubscribe()
    {
        $student = Student::where('id', auth('api')->id())->first();
        if ($student) {
            if ($student->subscribe == true) {
                $student->update([
                    'subscribe' => false,
                ]);
                $student->save();
                return $this->ok(['student unsubscribed successfully']);
            } else {
                return $this->forbidden(['student did not subscribe to unsubscribe']);
            }
        } else {
            return $this->notFound(['student not found']);
        }
    }
}
