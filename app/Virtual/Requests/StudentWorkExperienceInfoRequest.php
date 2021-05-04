<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"experience_type", "city", "country" ,"from","to",
 *              "currently_work","job_title","company_name","company_website"
 *      }
 * )
 */
class StudentWorkExperienceInfoRequest
{
    /**
     * @OA\Property(
     *      title="experience type",
     *      description="experience type",
     *      example="Internship"
     * )
     *
     * @var string
     */
    public $experience_type;
    /**
     * @OA\Property(
     *      title="Job Title",
     *      description="Job Title",
     *      example="Developer"
     * )
     *
     * @var string
     */
    public $job_title;

    /**
     * @OA\Property(
     *      title="Company Name",
     *      description="Company Name",
     *      example="Apple"
     * )
     *
     * @var string
     */
    public $company_name;

    /**
     * @OA\Property(
     *      title="Company Website",
     *      description="Company Website",
     *      example="https://facebook.com"
     * )
     *
     * @var string
     */
    public $company_website;
    /**
     * @OA\Property(
     *      title="city",
     *      description="city",
     *      example="Cairo"
     * )
     *
     * @var string
     */
    public $city;


    /**
     * @OA\Property(
     *      title="country",
     *      description="country",
     *      example="Egypt"
     * )
     *
     * @var string
     */
    public $country;



    /**
     * @OA\Property(
     *      title="Experience start date",
     *      description="Experience start date",
     *      example="2001-1-1"
     * )
     *
     * @var string
     */
    public $from;

    /**
     * @OA\Property(
     *      title="Experience end date",
     *      description="Experience end date",
     *      example="2017-1-1"
     * )
     *
     * @var string
     */
    public $to;


    /**
     * @OA\Property(
     *      title="Experience credential URL",
     *      description="Experience credential URL",
     *      example="https://www.google.com"
     * )
     *
     * @var string
     */
    public $cred_url;

    /**
     * @OA\Property(
     *      title="Experience Credential",
     *      description="Experience Credential",
     *      type="string",
     *      format="binary"
     * )
     *
     * @var string
     */
    public $cred;

    /**
     * @OA\Property(
     *      title="Currently working in the company",
     *      description="Currently working in the company",
     *      type="integer",
     *      example=0
     * )
     *
     * @var string
     */
    public $currently_work;
}
