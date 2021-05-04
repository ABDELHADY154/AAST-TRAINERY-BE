<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"name","email","password","password_confirmation","reg_no","gender","department_id"}
 * )
 */
class StudentRegisterRequest
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
     *      title="email",
     *      description="Student Email",
     *      example="email@email.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="Student password",
     *      example="Trainery@123"
     * )
     *
     * @var string
     */
    public $password;
    /**
     * @OA\Property(
     *      title="password confirmation",
     *      description="Student password confirmation",
     *      example="Trainery@123"
     * )
     *
     * @var string
     */
    public $password_confirmation;

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
}
