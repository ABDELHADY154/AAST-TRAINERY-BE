<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class StudentForgetPasswordRequest
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
}
