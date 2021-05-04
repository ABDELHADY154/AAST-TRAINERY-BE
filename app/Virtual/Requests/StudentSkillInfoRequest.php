<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 *      required={"skill_name" , "years_of_exp"
 *      }
 * )
 */
class StudentSkillInfoRequest
{
    /**
     * @OA\Property(
     *      title="Skill name",
     *      description="Skill name",
     *      example="Programming"
     * )
     *
     * @var string
     */
    public $skill_name;
    /**
     * @OA\Property(
     *      title="Skill years of experience",
     *      description="Skill years of experience",
     *      type="integer",
     *      example=3
     * )
     *
     * @var string
     */
    public $years_of_exp;
}
