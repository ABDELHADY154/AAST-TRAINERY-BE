<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="student update password",
 *      description="student update password body data",
 *      type="object",
 *      required={"password","password_confirmation"}
 * )
 */
class StudentAcountSettingsDeleteAcc
{


    /**
     * @OA\Property(
     *      title="Department ID",
     *      description="student new password",
     *      type="integer",
     *      example="asd@123ASD",

     * )
     *
     * @var string
     */
    public $password;

    /**
     * @OA\Property(
     *      title="Department ID",
     *      description="student new password confirmation",
     *      type="integer",
     *      example="asd@123ASD",

     * )
     *
     * @var string
     */
    public $password_confirmation;
}
