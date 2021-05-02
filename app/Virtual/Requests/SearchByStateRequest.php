<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student search by state",
 *      description="Student search by state body data",
 *      type="object",
 *      required={"state"}
 * )
 */
class SearchByStateRequest
{
    /**
     * @OA\Property(
     *      title="state",
     *      description="search by state like full time or part time",
     *      example="full time",
     * )
     *
     * @var string
     */
    public $state;
}
