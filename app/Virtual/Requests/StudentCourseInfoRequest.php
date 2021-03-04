<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"course_name" ,"from","to", "course_provider"
 *      }
 * )
 */
class StudentCourseInfoRequest
{
    /**
     * @OA\Property(
     *      title="Course name",
     *      description="Course name",
     *      example="Programming"
     * )
     *
     * @var string
     */
    public $course_name;
    /**
     * @OA\Property(
     *      title="Course Provider Name",
     *      description="Course Provider Name",
     *      example="Udemy"
     * )
     *
     * @var string
     */
    public $course_provider;



    /**
     * @OA\Property(
     *      title="Course start date",
     *      description="Course start date",
     *      type="date",
     *      example="2001-1-1"
     * )
     *
     * @var string
     */
    public $from;

    /**
     * @OA\Property(
     *      title="Course end date",
     *      description="Course end date",
     *      type="date",
     *      example="2017-1-1"
     * )
     *
     * @var string
     */
    public $to;


    /**
     * @OA\Property(
     *      title="School credential URL",
     *      description="School credential URL",
     *      example="https://www.google.com"
     * )
     *
     * @var string
     */
    public $cred_url;

    /**
     * @OA\Property(
     *      title="School Credential",
     *      description="School Credential",
     *      type="string",
     *      format="binary"
     * )
     *
     * @var string
     */
    public $cred;
}
