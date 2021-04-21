<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use Algolia\AlgoliaSearch\SearchIndex;
use App\Company;
use App\Http\Controllers\Controller;
use App\Http\Resources\InternshipPostExploreResource;
use App\Http\Resources\InternshipPostResource;
use App\InternshipPost;
use App\Student;
use App\TrainingAdvisor;
use Illuminate\Http\Request;
use IlluminateAgnostic\Arr\Support\Arr;

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
     *      path="/W/student/posts?page={pageNumber}",
     *      operationId="Internship Posts",
     *      description="Get all Internship Post ",
     *      summary="Get all Internship Post",
     *      tags={"W-Explore"},
     *      security={
     *          {"passport": {}},
     *     },
     *      @OA\Parameter(
     *          name="pageNumber",
     *          description="pagination value",
     *          required=false,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
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
        $posts = InternshipPost::orderBy('id', 'desc')->paginate(10);
        return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
    }

    /**
     * @OA\Get(
     *      path="/A/student/posts?page={pageNumber}",
     *      operationId="Internship Posts",
     *      description="Get all Internship Post ",
     *      summary="Get all Internship Post",
     *      tags={"A-Explore"},
     *      @OA\Parameter(
     *          name="pageNumber",
     *          description="pagination value",
     *          required=false,
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
    public function mGetAllPostsExplore()
    {
        $posts = InternshipPost::orderBy('id', 'desc')->paginate(10);
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

        return $this->ok(InternshipPostExploreResource::collection($posts)->resolve());
    }
    /**
     * @OA\POST(
     *      path="/W/student/save/{postId}",
     *      summary="Save Post",
     *      tags={"W-SavePost"},
     *      description="Save Post",
     *      @OA\Parameter(
     *          name="postId",
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
     *          response="404",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="403",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response403Virtual")
     *     )
     * )
     */
    public function savePost($postId)
    {
        $student = Student::where('id', auth('api')->id())->first();
        $post = InternshipPost::where('id', $postId)->first();
        if ($post) {
            if ($post->post_type == "adsPost") {
                return $this->forbidden(['Post cannot be saved']);
            } else {
                if ($student->hasFavorited($post)) {
                    return $this->forbidden(['message' => 'post is already saved']);
                } else {
                    $student->favorite($post);
                    return $this->created(['message' => 'post saved successfullty']);
                }
            }
        } else {
            return $this->notFound(['post is not found']);
        }
    }
    /**
     * @OA\POST(
     *      path="/W/student/unsave/{postId}",
     *      summary="unSave Post",
     *      tags={"W-SavePost"},
     *      description="unSave Post",
     *      @OA\Parameter(
     *          name="postId",
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
     *          response="404",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="403",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response403Virtual")
     *     )
     * )
     */
    public function unSavePost($postId)
    {
        $student = Student::where('id', auth('api')->id())->first();
        $post = InternshipPost::where('id', $postId)->first();
        if ($post) {
            if ($post->post_type == "adsPost") {
                return $this->forbidden(['Post cannot be unsaved']);
            } else {
                if (!$student->hasFavorited($post)) {
                    return $this->forbidden(['message' => 'post is not saved to be unsaved']);
                } else {
                    $student->unfavorite($post);
                    return $this->created(['message' => 'post unsaved successfullty']);
                }
            }
        } else {
            return $this->notFound(['post is not found']);
        }
    }

    /**
     * @OA\POST(
     *      path="/A/student/save/{postId}",
     *      summary="Save Post",
     *      tags={"A-SavePost"},
     *      description="Save Post",
     *      @OA\Parameter(
     *          name="postId",
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
     *          response="404",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="403",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response403Virtual")
     *     )
     * )
     */
    public function mSavePost($postId)
    {
        $student = Student::where('id', auth('api')->id())->first();
        $post = InternshipPost::where('id', $postId)->first();
        if ($post) {
            if ($post->post_type == "adsPost") {
                return $this->forbidden(['Post cannot be saved']);
            } else {
                if ($student->hasFavorited($post)) {
                    return $this->forbidden(['message' => 'post is already saved']);
                } else {
                    $student->favorite($post);
                    return $this->created(['message' => 'post saved successfullty']);
                }
            }
        } else {
            return $this->notFound(['post is not found']);
        }
    }
    /**
     * @OA\POST(
     *      path="/A/student/unsave/{postId}",
     *      summary="unSave Post",
     *      tags={"A-SavePost"},
     *      description="unSave Post",
     *      @OA\Parameter(
     *          name="postId",
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
     *          response="404",
     *          description="Validation Error",
     *           @OA\JsonContent(ref="#/components/schemas/Response404Virtual")
     *     ),
     *
     *     @OA\Response(
     *          response="403",
     *          description="Unauthorized",
     *           @OA\JsonContent(ref="#/components/schemas/Response403Virtual")
     *     )
     * )
     */
    public function mUnSavePost($postId)
    {
        $student = Student::where('id', auth('api')->id())->first();
        $post = InternshipPost::where('id', $postId)->first();
        if ($post) {
            if ($post->post_type == "adsPost") {
                return $this->forbidden(['Post cannot be unsaved']);
            } else {
                if (!$student->hasFavorited($post)) {
                    return $this->forbidden(['message' => 'post is not saved to be unsaved']);
                } else {
                    $student->unfavorite($post);
                    return $this->created(['message' => 'post unsaved successfullty']);
                }
            }
        } else {
            return $this->notFound(['post is not found']);
        }
    }
    /**
     * @OA\Get(
     *      path="/A/student/saved",
     *      summary="get saved Posts",
     *      tags={"A-SavePost"},
     *      description="get saved Posts",
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

    /**
     * @OA\Get(
     *      path="/W/student/saved",
     *      summary="get saved Posts",
     *      description="get saved Posts",
     *      tags={"W-SavePost"},
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
        $student = Student::where('id', auth('api')->id())->first();
        $savedPosts = $student->getFavoriteItems(InternshipPost::class)->orderBy('id', 'desc')->get();
        return $this->ok(InternshipPostExploreResource::collection($savedPosts)->resolve());
        // dd($savedPosts);
    }
}
