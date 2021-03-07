<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Login Request",
 *      description="Student Login Request body data",
 *      type="object",
 * )
 */
class StudentAccountRequest
{
    /**
     * @OA\Property(
     *      title="website",
     *      description="website",
     *      example="https://www.google.com"
     * )
     *
     * @var string
     */
    public $website;

    /**
     * @OA\Property(
     *      title="Facebook Account",
     *      description="Facebook Account",
     *      example="https://www.facebook.com/myProfile"
     * )
     *
     * @var string
     */
    public $facebook;

    /**
     * @OA\Property(
     *      title="Instagram Account",
     *      description="Instagram Account",
     *      example="https://www.instagram.com/myProfile"
     * )
     *
     * @var string
     */
    public $instagram;

    /**
     * @OA\Property(
     *      title="Youtube Account",
     *      description="Youtube Account",
     *      example="https://www.youtube.com/myProfile"
     * )
     *
     * @var string
     */
    public $youtube;

    /**
     * @OA\Property(
     *      title="LinkedIn Account",
     *      description="LinkedIn Account",
     *      example="https://www.linkedin.com/myProfile"
     * )
     *
     * @var string
     */
    public $linkedin;

    /**
     * @OA\Property(
     *      title="Behance Account",
     *      description="Behance Account",
     *      example="https://www.behance.net/myProfile"
     * )
     *
     * @var string
     */
    public $behance;

    /**
     * @OA\Property(
     *      title="Github Account",
     *      description="Github Account",
     *      example="https://www.github.com/myProfile"
     * )
     *
     * @var string
     */
    public $github;
}
