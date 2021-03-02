<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"name","phone_number","university","city","reg_no","gender","department_id","country"
 *          ,"nationality", "date_of_birth","start_year","end_year","gpa","period"
 *      }
 * )
 */
class StudentGeneralInfoRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Student name",
     *      example="Full Name"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="phone number",
     *      description="Student phone number",
     *      example="+201000011111"
     * )
     *
     * @var string
     */
    public $phone_number;

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
     *      title="city",
     *      description="Student city",
     *      example="Cairo"
     * )
     *
     * @var string
     */
    public $city;

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
     *      title="gender",
     *      description="Student gender",
     *      example="male"
     * )
     *
     * @var string
     */
    public $gender;


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
     *      title="country",
     *      description="Student country",
     *      example="Egypt"
     * )
     *
     * @var string
     */
    public $country;

    /**
     * @OA\Property(
     *      title="nationality",
     *      description="Student nationality",
     *      example="Egyptian"
     * )
     *
     * @var string
     */
    public $nationality;

    /**
     * @OA\Property(
     *      title="date of birth",
     *      description="Student date of birth",
     *      example="1997-04-15"
     * )
     *
     * @var string
     */
    public $date_of_birth;

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

    /**
     * @OA\Property(
     *      title="Student Image",
     *      description="Student Image",
     *      type="string",
     *      format="binary"
     * )
     *
     * @var string
     */
    public $image;
}
