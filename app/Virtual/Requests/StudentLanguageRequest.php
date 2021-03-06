<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"language" , "level"
 *      }
 * )
 */
class StudentLanguageRequest
{
    /**
     * @OA\Property(
     *      title="Language",
     *      description="Language",
     *      example="English"
     * )
     *
     * @var string
     */
    public $language;
    /**
     * @OA\Property(
     *      title="Language Level",
     *      description="Language Level",
     *      type="integer",
     *      example=3
     * )
     *
     * @var string
     */
    public $level;
}
