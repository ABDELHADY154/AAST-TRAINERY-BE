<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"university","reg_no","department_id"
 *          ,"start_year","end_year","gpa","period"
 *      }
 * )
 */
class StudentAcademicInfoRequest
{



    /**
     * @OA\Property(
     *      title="university",
     *      description="Student university",
     *      example="Arab Academy for science and technology"
     * )
     *
     * @var string
     */
    public $university;


    /**
     * @OA\Property(
     *      title="registration number",
     *      description="Student registration number",
     *      example="17200222"
     * )
     *
     * @var string
     */
    public $reg_no;



    /**
     * @OA\Property(
     *      title="department",
     *      description="Student department",
     *      example="1"
     * )
     *
     * @var string
     */
    public $department_id;




    /**
     * @OA\Property(
     *      title="Student start year",
     *      description="Student start year",
     *      example="2015"
     * )
     *
     * @var string
     */
    public $start_year;

    /**
     * @OA\Property(
     *      title="Student end year",
     *      description="Student end year",
     *      example="2020"
     * )
     *
     * @var string
     */
    public $end_year;

    /**
     * @OA\Property(
     *      title="Student GPA",
     *      description="Student GPA",
     *      example="3.5"
     * )
     *
     * @var string
     */
    public $gpa;

    /**
     * @OA\Property(
     *      title="Student period",
     *      description="Student period",
     *      example="8"
     * )
     *
     * @var string
     */
    public $period;
}
