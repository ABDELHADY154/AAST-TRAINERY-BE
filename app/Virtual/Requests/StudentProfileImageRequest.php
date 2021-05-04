<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Profile Request",
 *      description="Student Profile Request body data",
 *      type="object",
 *      required={"image"
 *      }
 * )
 */
class StudentProfileImageRequest
{

    /**
     * @OA\Property(
     *      title="Student Image",
     *      description="Student Image",
     *      type="string",
     *      format="binary"
     * )
     *
     * @var string
     */
    public $image;
}
