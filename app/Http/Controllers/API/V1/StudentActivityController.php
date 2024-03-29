<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\InternshipPostExploreResource;
use App\Http\Resources\SessionResource;
use App\InternshipPost;
use App\Student;
use Illuminate\Http\Request;

class StudentActivityController extends Controller
{
    use CoreJsonResponse;

    /**
     * @OA\Get(
     *      path="/W/student/studentApplied",
     *      operationId="Student applied Posts",
     *      description="Student applied Posts",
     *      summary="Student applied Posts",
     *      tags={"W-StudentActivity"},
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
    public function getAppliedPosts()
    {
        $student = Student::where('id', auth('api')->id())->first();
        $posts = $student->applications()->where('application_status', 'applied')->get();
        return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
    }
    /**
     * @OA\Get(
     *      path="/W/student/studentAccepted",
     *      operationId="Student accepted Posts",
     *      description="Student accepted Posts",
     *      summary="Student accepted Posts",
     *      tags={"W-StudentActivity"},
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
    public function getAcceptedPosts()
    {
        $student = Student::where('id', auth('api')->id())->first();
        $posts = $student->applications()->where('application_status', 'accepted')->get();
        return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
    }
    /**
     * @OA\Get(
     *      path="/W/student/studentSaved",
     *      operationId="Student saved Posts",
     *      description="Student saved Posts",
     *      summary="Student saved Posts",
     *      tags={"W-StudentActivity"},
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
    public function getSavedPosts()
    {
        $student = auth()->guard('api')->user();
        $posts = $student->favorites()->get();
        $postIdArr = [];
        foreach ($posts as $post) {
            $postIdArr[] = $post->favoriteable_id;
        }
        $savedPosts =  InternshipPost::whereIn('id', $postIdArr)->orderBy('id', 'desc')->get();
        return $this->ok(InternshipPostExploreResource::collection($savedPosts)->resolve());
    }

    /**
     * @OA\Get(
     *      path="/A/student/studentApplied",
     *      operationId="Student applied Posts",
     *      description="Student applied Posts",
     *      summary="Student applied Posts",
     *      tags={"A-StudentActivity"},
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
    public function mGetAppliedPosts()
    {
        $student = Student::where('id', auth('api')->id())->first();
        $posts = $student->applications()->where('application_status', 'applied')->get();
        return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
    }
    /**
     * @OA\Get(
     *      path="/A/student/studentAccepted",
     *      operationId="Student accepted Posts",
     *      description="Student accepted Posts",
     *      summary="Student accepted Posts",
     *      tags={"A-StudentActivity"},
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
    public function mGetAcceptedPosts()
    {
        $student = Student::where('id', auth('api')->id())->first();
        $posts = $student->applications()->where('application_status', 'accepted')->get();
        return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
    }
    /**
     * @OA\Get(
     *      path="/A/student/studentSaved",
     *      operationId="Student saved Posts",
     *      description="Student saved Posts",
     *      summary="Student saved Posts",
     *      tags={"A-StudentActivity"},
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
    public function mGetSavedPosts()
    {
        $student = auth()->guard('api')->user();
        $posts = $student->favorites()->get();
        $postIdArr = [];
        foreach ($posts as $post) {
            $postIdArr[] = $post->favoriteable_id;
        }
        $savedPosts =  InternshipPost::whereIn('id', $postIdArr)->orderBy('id', 'desc')->get();
        return $this->ok(InternshipPostExploreResource::collection($savedPosts)->resolve());
    }
    /**
     * @OA\Get(
     *      path="/W/activity",
     *      operationId="Student Home Activity section Posts",
     *      description="Student Home Activity section Posts",
     *      summary="Student Home Activity section Posts",
     *      tags={"W-StudentActivity"},
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
    public function homeActivity()
    {
        $resultArr = [];
        $student = auth()->guard('api')->user();
        $savedPostModel = $student->favorites()->latest()->first();
        $savedPost = InternshipPost::find($savedPostModel->favoriteable_id);
        $appliedPost = $student->applications()->latest()->first();
        if ($savedPost->id === $appliedPost->id) {
            $resultArr[] = $savedPost;
            // $resultArr[] = $appliedPost;
        } else {
            $resultArr[] = $savedPost;
            $resultArr[] = $appliedPost;
        }

        return $this->ok(InternshipPostExploreResource::collection($resultArr)->resolve());
    }
    /**
     * @OA\Get(
     *      path="/W/student/studentSessions",
     *      operationId="Student Booked Sessions",
     *      description="Student Booked Sessions",
     *      summary="Student Booked Sessions",
     *      tags={"W-StudentActivity"},
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
    public function getStudentSessions()
    {
        $student = Student::where('id', auth('api')->id())->first();
        $sessions = $student->sessions()->get();
        return $this->ok(SessionResource::collection($sessions)->resolve());
    }
    /**
     * @OA\Get(
     *      path="/A/student/studentSessions",
     *      operationId="Student Booked Sessions",
     *      description="Student Booked Sessions",
     *      summary="Student Booked Sessions",
     *      tags={"A-StudentActivity"},
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
    public function mGetStudentSessions()
    {
        $student = Student::where('id', auth('api')->id())->first();
        $sessions = $student->sessions()->get();
        return $this->ok(SessionResource::collection($sessions)->resolve());
    }
}
