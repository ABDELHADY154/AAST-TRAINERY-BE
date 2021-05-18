<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="student update password",
 *      description="student update password body data",
 *      type="object",
 *      required={"email"}
 * )
 */
class StudentAcountSettingsEmail
{
    /**
     * @OA\Property(
     *      title="Email",
     *      description="student new email",
     *      type="string",
     *      example="email@student.aast.edu",

     * )
     *
     * @var string
     */
    public $email;
}
