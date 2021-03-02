<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"email","password"}
 * )
 */
class StudentLoginRequest
{
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
}
