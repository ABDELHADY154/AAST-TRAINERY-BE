<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"name","phone_number","city","gender","country"
 *          ,"nationality", "date_of_birth"
 *      }
 * )
 */
class StudentPersonalInfoRequest
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
}
