<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileAccountsResource;
use Illuminate\Http\Request;

class ProfileAccountsController extends Controller
{
    use CoreJsonResponse;

    public function __construct()
    {
        $this->student = auth('api')->user();
    }

    public function index()
    {
        $student = $this->student;
        // dd($student->accounts);
        $profileAccount = new ProfileAccountsResource($student->accounts);
        //ProfileAccountsResource::collection($student->accounts);
        return $this->ok($profileAccount->resolve());
    }
}
