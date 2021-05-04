<?php

namespace App\Virtual\Models;

/**
 * @OA\Schema(
 * title="Student",
 * description="Srudent model",
 * @OA\Xml(
 * name="Student"
 * )
 * )
 */
class Student
{

    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name of the Student",
     *      example="Abdelhady"
     * )
     *
     * @var string
     */
    public $name;
}
