<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student search by Dep",
 *      description="Student search by Dep body data",
 *      type="object",
 *      required={"departmeny_id"}
 * )
 */
class SearchByDepRequest
{
    /**
     * @OA\Property(
     *      title="Department ID",
     *      description="Student search by Dep body data",
     *      type="integer",
     *      example=1,

     * )
     *
     * @var string
     */
    public $department_id;
}
