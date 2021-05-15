<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\StudentReviewCCResource;
use App\Http\Resources\StudentReviewPostResource;
use App\Http\Resources\StudentReviewSessionResource;
use App\InternshipPost;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentReviewsController extends Controller
{
    use CoreJsonResponse;

    /**
     * @OA\POST(
     *      path="/W/student/review/{id}",
     *      summary="student Review Internship",
     *      tags={"W-Student Review Internship"},
     *      description="student Review Internship",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          description="Student Review Internship",
     *          @OA\JsonContent(ref="#/components/schemas/studentReviewPostRequest")
     *     ),
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    public function reviewPost(Request $request, $postId)
    {
        $request->validate([
            'comment' => ['required', 'string'],
            'rate' => ['required', 'integer', 'between:1,5']
        ]);
        $post = InternshipPost::find($postId);
        $student = auth('api')->user();
        if ($post) {
            foreach ($student->applications as $stu) {
                if ($stu->pivot->application_status == "achieved" && $post->id == $stu->pivot->internship_post_id) {
                    foreach ($student->postReviews as $review) {
                        if ($review->pivot->student_id == $student->id && $review->pivot->internship_post_id == $post->id) {
                            return $this->forbidden(['this internship is already reviewed']);
                        }
                    }
                    $student->postReviews()->attach($student->id, [
                        'comment' => $request->comment,
                        'rate' => $request->rate,
                        'internship_post_id' => $post->id
                    ]);
                    return $this->ok(['reviewed successfully']);
                }
            }
            return $this->forbidden(['Please check that Your Intern is achieved to be review']);
        } else {
            return $this->notFound(['Post not found']);
        }
    }
    /**
     * @OA\POST(
     *      path="/A/student/review/{id}",
     *      summary="student Review Internship",
     *      tags={"A-Student Review Internship"},
     *      description="student Review Internship",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          description="Student Review Internship",
     *          @OA\JsonContent(ref="#/components/schemas/studentReviewPostRequest")
     *     ),
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    public function mReviewPost(Request $request, $postId)
    {
        $request->validate([
            'comment' => ['required', 'string'],
            'rate' => ['required', 'integer', 'between:1,5']
        ]);
        $post = InternshipPost::find($postId);
        $student = auth('api')->user();
        if ($post) {
            foreach ($student->applications as $stu) {
                if ($stu->pivot->application_status == "achieved" && $post->id == $stu->pivot->internship_post_id) {
                    foreach ($student->postReviews as $review) {
                        if ($review->pivot->student_id == $student->id && $review->pivot->internship_post_id == $post->id) {
                            return $this->forbidden(['this internship is already reviewed']);
                        }
                    }
                    $student->postReviews()->attach($student->id, [
                        'comment' => $request->comment,
                        'rate' => $request->rate,
                        'internship_post_id' => $post->id
                    ]);
                    return $this->ok(['reviewed successfully']);
                }
            }
            return $this->forbidden(['Please check that Your Intern is achieved to be review']);
        } else {
            return $this->notFound(['Post not found']);
        }
    }
    /**
     * @OA\Get(
     *      path="/W/student/review/{id}",
     *      summary="Internship All Reviews",
     *      tags={"W-Student Review Internship"},
     *      description="Internship All Reviews",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    public function getAllPostReviews($postId)
    {
        $post = InternshipPost::find($postId);
        if ($post) {
            $reviews = $post->studentReviews;
            return $this->ok(StudentReviewPostResource::collection($reviews)->resolve());
        } else {
            return $this->notFound(['post not found']);
        }
    }
    /**
     * @OA\Get(
     *      path="/A/student/review/{id}",
     *      summary="Internship All Reviews",
     *      tags={"A-Student Review Internship"},
     *      description="Internship All Reviews",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    public function mGetAllPostReviews($postId)
    {
        $post = InternshipPost::find($postId);
        if ($post) {
            $reviews = $post->studentReviews;
            return $this->ok(StudentReviewPostResource::collection($reviews)->resolve());
        } else {
            return $this->notFound(['post not found']);
        }
    }
    /**
     * @OA\Get(
     *      path="/W/student/sessionReview/{id}",
     *      summary="Session All Reviews",
     *      tags={"W-Student Review Session"},
     *      description="Session All Reviews",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    /**
     * @OA\Get(
     *      path="/A/student/sessionReview/{id}",
     *      summary="Session All Reviews",
     *      tags={"A-Student Review Session"},
     *      description="Session All Reviews",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    public function getAllSessionReviews($sessionId)
    {
        $session = Session::find($sessionId);
        if ($session) {
            $reviews = $session->studentReviews()->orderBy('rate', 'desc')->get();
            return $this->ok(StudentReviewSessionResource::collection($reviews)->resolve());
        } else {
            return $this->notFound(['session not found']);
        }
    }
    /**
     * @OA\Get(
     *      path="/W/student/careerCoachingReviews",
     *      summary="Career Coaching All Reviews",
     *      tags={"W-Student Review Session"},
     *      description="Career Coaching All Reviews",
     *     security={
     *          {"passport": {}},
     *     },
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    /**
     * @OA\Get(
     *      path="/A/student/careerCoachingReviews",
     *      summary="Career Coaching All Reviews",
     *      tags={"A-Student Review Session"},
     *      description="Career Coaching All Reviews",
     *     security={
     *          {"passport": {}},
     *     },
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    public function getAllCareerCoachingReviews()
    {
        $reviews = DB::table('student_session_reviews')->orderBy('rate', 'desc')->get();
        return $this->ok(StudentReviewCCResource::collection($reviews)->resolve());
    }


    /**
     * @OA\POST(
     *      path="/W/student/sessionReview/{id}",
     *      summary="student Review Session",
     *      tags={"W-Student Review Session"},
     *      description="student Review Session",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          description="Student Review Internship",
     *          @OA\JsonContent(ref="#/components/schemas/studentReviewPostRequest")
     *     ),
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */

    /**
     * @OA\POST(
     *      path="/A/student/sessionReview/{id}",
     *      summary="student Review Session",
     *      tags={"A-Student Review Session"},
     *      description="student Review Session",
     *      @OA\Parameter(
     *          name="id",
     *          description="Post id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     security={
     *          {"passport": {}},
     *     },
     *     @OA\RequestBody(
     *          required=true,
     *          description="Student Review Internship",
     *          @OA\JsonContent(ref="#/components/schemas/studentReviewPostRequest")
     *     ),
     *
     *     @OA\Response(
     *          response="201",
     *          description="Student Data to success",
     *           @OA\JsonContent(ref="#/components/schemas/SuccessAcceptedVirtual")
     *      ),
     *
     *     @OA\Response(
     *          response="422",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response422Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
     *     )
     * )
     */
    public function reviewSession(Request $request, $sessionId)
    {
        $request->validate([
            'comment' => ['required', 'string'],
            'rate' => ['required', 'integer', 'between:1,5']
        ]);
        $post = Session::find($sessionId);
        $student = auth('api')->user();
        if ($post) {
            foreach ($student->sessions as $stu) {
                if ($stu->pivot->book_status == "achieved" && $post->id == $stu->pivot->session_id) {
                    foreach ($post->studentReviews as $review) {
                        if ($review->pivot->student_id == $student->id && $review->pivot->session_id == $post->id) {
                            return $this->forbidden(['this internship is already reviewed']);
                        }
                    }
                    $post->studentReviews()->attach($post->id, [
                        'comment' => $request->comment,
                        'rate' => $request->rate,
                        'student_id' => $student->id
                    ]);
                    return $this->ok(['reviewed successfully']);
                }
            }
            return $this->forbidden(['Please check that Your Session is achieved to be review']);
        } else {
            return $this->notFound(['Session not found']);
        }
    }
}
