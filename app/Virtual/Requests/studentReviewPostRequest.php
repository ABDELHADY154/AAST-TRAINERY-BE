<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Reveiw Intern",
 *      description="Student Reveiw Intern body data",
 *      type="object",
 *      required={"comment","rate"}
 * )
 */
class studentReviewPostRequest
{
    /**
     * @OA\Property(
     *      title="comment",
     *      description="comment",
     *      example="perfect internship",

     * )
     *
     * @var string
     */
    public $comment;

    /**
     * @OA\Property(
     *      title="rate",
     *      description="rate",
     *      type="integer",
     *      example=3,
     * )
     *
     * @var string
     */
    public $rate;
}
