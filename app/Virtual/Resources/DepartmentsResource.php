<?php

namespace App\Virtual\Resource\DepartmentsResource;

/**
 * @OA\Schema(
 *     title="DepartmentResource",
 *     description="departments resource",
 *     type="object"
 * )
 */
class DepartmentsResource
{
    /**
     * @OA\Property(
     *      title="id",
     *      description="department id",
     *      example=1
     * )
     *
     * @var string
     */
    public $id;

    /**
     * @OA\Property(
     *      title="department name",
     *      description="department name",
     *      example="Accounting"
     * )
     *
     * @var string
     */
    public $dep_name;
}
