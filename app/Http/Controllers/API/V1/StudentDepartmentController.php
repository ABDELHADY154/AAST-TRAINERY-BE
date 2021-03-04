<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentDepartmentResource;
use App\StudentDepartment;
use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

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
    /**
     * @OA\Get(
     *      path="/countriesList",
     *      operationId="getCountriesList",
     *      tags={"Students"},
     *      summary="Get list of Countries",
     *      description="Returns list of Countries",
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
    public function countriesList()
    {
        $newCountriesArr = [];
        $countries = new Countries();
        $JsonCountries = $countries->all();
        foreach ($JsonCountries as $key => $country) {
            $newCountriesArr[$key] = $country->name->common;
        }
        return $newCountriesArr;
    }
    /**
     * @OA\Get(
     *      path="/stateList/{code}",
     *      operationId="getCitiesList",
     *      tags={"Students"},
     *      summary="Get list of Cities",
     *      description="Returns list of Cities",
     *      @OA\Parameter(
     *          name="code",
     *          description="City Code",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
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
    public function states($code)
    {
        $citiesList = [];
        $countries = new Countries();
        $cities = $countries->where('cca3', $code)->first()->hydrate('Cities')->cities;
        foreach ($cities as $key => $city) {
            $citiesList[] = $city["name"];
        }
        return ($citiesList);
    }
}
