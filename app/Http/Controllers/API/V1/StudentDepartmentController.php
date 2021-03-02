<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentDepartmentResource;
use App\StudentDepartment;
use Illuminate\Http\Request;

class StudentDepartmentController extends Controller
{
    use CoreJsonResponse;

    /**
     * @OA\Get(
     *      path="/departments",
     *      operationId="getDepartments",
     *      tags={"Departments"},
     *      summary="Get list of departments",
     *      description="Returns list of departments",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SuccessOkVirtual")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden",
     *          @OA\JsonContent(ref="#/components/schemas/Response403Virtual")
     *      )
     *     )
     */

    public function index()
    {
        $departments = StudentDepartmentResource::collection(StudentDepartment::all());
        return $this->ok($departments->resolve());
    }
}
