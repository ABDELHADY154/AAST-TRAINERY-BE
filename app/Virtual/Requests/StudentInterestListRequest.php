<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Interests Request",
 *      description="Student Interests Request body data",
 *      type="object",
 *      required={"interests" }
 * )
 */
class StudentInterestListRequest
{
    /**
     * @OA\Property(title="Interest List", description="Interest list", type="object", example=
     *   {
     *       {
     *          "interest":"Coding"
     *       },
     *       {
     *          "interest":"UI/UX"
     *       }
     *   },
     *)
     */
    private $interests;
}
