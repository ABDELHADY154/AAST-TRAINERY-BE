<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\InternshipPostExploreResource;
use App\Http\Resources\InternshipPostResource;
use App\InternshipPost;
use App\Student;
use App\TrainingAdvisor;
use Illuminate\Http\Request;

class InternshipPostController extends Controller
{
    use CoreJsonResponse;

    /**
     * @OA\Get(
     *      path="/W/student/post/{id}",
     *      operationId="showInternship Post",
     *      description="Get Internship Post ",
     *      summary="Get Internship Post",
     *      tags={"W-Get Profiles"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Internship Post Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *      )
     * )
     */
    public function show($id)
    {
        $internship = InternshipPost::where('id', $id)->first();
        if (!$internship) {
            return  $this->notFound(['message' => 'Internship Post Not Found']);
        }
        return $this->ok((new InternshipPostResource($internship))->resolve());
    }
    /**
     * @OA\Get(
     *      path="/A/student/post/{id}",
     *      operationId="showInternship Post",
     *      description="Get Internship Post ",
     *      summary="Get Internship Post",
     *      tags={"A-Get Profiles"},
     *      @OA\Parameter(
     *          name="id",
     *          description="Internship Post Id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *      )
     * )
     */
    public function mshow($id)
    {

        $internship = InternshipPost::where('id', $id)->first();
        if (!$internship) {
            return  $this->notFound(['message' => 'Internship Post Not Found']);
        }
        return $this->ok((new InternshipPostResource($internship))->resolve());
    }
    /**
     * @OA\Get(
     *      path="/W/landingCount",
     *      operationId="getLandingPageCounterData",
     *      tags={"Landing Page"},
     *      summary="Get landing page counter data",
     *      description="Returns landing page counter data",
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
    public function getLandingCounts()
    {
        $students = Student::all()->count();
        $internshipPosts = InternshipPost::all()->count();
        $applied = 500;
        $result = ['students' => $students, 'opportunities' => $internshipPosts, 'applied' => $applied];
        return $this->ok($result);
    }
    /**
     * @OA\Get(
     *      path="/W/student/posts",
     *      operationId="Internship Posts",
     *      description="Get all Internship Post ",
     *      summary="Get all Internship Post",
     *      tags={"W-Explore"},
     *     security={
     *          {"passport": {}},
     *     },
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *      )
     * )
     */
    public function getAllPostsExplore()
    {
        $posts = InternshipPost::orderBy('id', 'desc')->get();
        return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
    }

    /**
     * @OA\Get(
     *      path="/A/student/posts",
     *      operationId="Internship Posts",
     *      description="Get all Internship Post ",
     *      summary="Get all Internship Post",
     *      tags={"A-Explore"},
     *     security={
     *          {"passport": {}},
     *     },
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *      )
     * )
     */
    public function mGetAllPostsExplore()
    {
        $posts = InternshipPost::orderBy('id', 'desc')->get();
        return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
    }
    /**
     * @OA\Get(
     *      path="/W/student/search/{val}",
     *      operationId="Search for Post",
     *      description="Search For Internship Post",
     *      summary="Search For Internship Post",
     *      tags={"W-Explore"},
     *      @OA\Parameter(
     *          name="val",
     *          description="Search value",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *      )
     * )
     */
    public function search($val)
    {
        $posts = InternshipPost::search($val)->get();
        $advisors = TrainingAdvisor::search($val)->get();
        $companies = Company::search($val)->get();
        if (count($posts) == 0) {
            if (count($advisors)) {
                $posts = InternshipPost::where('training_advisor_id', $advisors->first()->id)->get();
                return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
            } elseif (count($companies)) {
                $posts = InternshipPost::where('company_id', $companies->first()->id)->get();
                return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
            }
        }
        return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
    }

    /**
     * @OA\Get(
     *      path="/A/student/search/{val}",
     *      operationId="Search for Post",
     *      description="Search For Internship Post",
     *      summary="Search For Internship Post",
     *      tags={"A-Explore"},
     *      @OA\Parameter(
     *          name="val",
     *          description="Search value",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
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
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found",
     *          @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *      )
     * )
     */
    public function mSearch($val)
    {
        $posts = InternshipPost::search($val)->get();
        $advisors = TrainingAdvisor::search($val)->get();
        $companies = Company::search($val)->get();
        if (count($posts) == 0) {
            if (count($advisors)) {
                $posts = InternshipPost::where('training_advisor_id', $advisors->first()->id)->get();
                return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
            } elseif (count($companies)) {
                $posts = InternshipPost::where('company_id', $companies->first()->id)->get();
                return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
            }
        }
        return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
    }
}
