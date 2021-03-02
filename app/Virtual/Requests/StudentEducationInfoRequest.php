<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"school_name", "city", "country" ,"from","to","cred_url"
 *      }
 * )
 */
class StudentEducationInfoRequest
{
    /**
     * @OA\Property(
     *      title="School name",
     *      description="School name",
     *      example="Arab academy school"
     * )
     *
     * @var string
     */
    public $school_name;

    /**
     * @OA\Property(
     *      title="city",
     *      description="School city",
     *      example="Cairo"
     * )
     *
     * @var string
     */
    public $city;


    /**
     * @OA\Property(
     *      title="country",
     *      description="School country",
     *      example="Egypt"
     * )
     *
     * @var string
     */
    public $country;



    /**
     * @OA\Property(
     *      title="school start date",
     *      description="school start date",
     *      example="2001-1-1"
     * )
     *
     * @var string
     */
    public $from;

    /**
     * @OA\Property(
     *      title="school end date",
     *      description="school end date",
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
     *      example="www.google.com"
     * )
     *
     * @var string
     */
    public $cred_url;

    /**
     * @OA\Property(
     *      title="School Image",
     *      description="School Image",
     *      type="string",
     *      format="binary"
     * )
     *
     * @var string
     */
    public $cred;
}
