<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentGeneralInfoRequest;
use App\Http\Resources\StudentGeneralInfoResource;
use App\Http\Resources\StudentResource;
use Illuminate\Http\Request;

class StudentProfileController extends Controller
{
    use CoreJsonResponse;
    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    public function generalInfo(StudentGeneralInfoRequest $request)
    {
        if ($request->file('image')) {
            $imageName = $request->file('image')->hashName();
            $path = $request->file('image')->storeAs(
                'public/images/avatars',
                $imageName
            );
        }
        $student = $this->student->update($request->all());
        $this->student->save();
        return $this->created((new StudentGeneralInfoResource(auth('api')->user()))->resolve());
    }
    public function getGeneralInfo()
    {
        $student = $this->student;
        return $this->created((new StudentGeneralInfoResource($student))->resolve());
    }
}
