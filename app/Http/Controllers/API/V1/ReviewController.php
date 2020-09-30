<?php

namespace App\Http\Controllers\API\V1;

use AElnemr\RestFullResponse\CoreJsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    use CoreJsonResponse;


    public function index()
    {
        $reviews = ReviewResource::collection(Review::all());
        return $this->ok($reviews->resolve());
    }
}
