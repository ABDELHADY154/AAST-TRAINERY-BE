<?php


namespace App\Virtual\Resources\Errors;

/**
 * @OA\Schema(
 *     title="response Error 403",
 *     description="response Error 403",
 *     type="object",
 * )
 */
class Response403Virtual
{
    /**
     * @OA\Property(
     *      title="status",
     *      description="Status",
     *      example=403
     * )
     *
     * @var bool
     */
    public $status;

    /**
     * @OA\Property(
     *      title="message",
     *      description="forbidden",
     *      example="forbidden"
     * )
     *
     * @var string
     */
    public $message;

    /**
     * @OA\Property(
     *      title="data",
     *      description="data object",
     *      type="object",
     *      @OA\Property(
     *          property="data",
     *          type="object"
     *      ),
     *      @OA\Property(
     *          property="meta",
     *          type="object"
     *      )
     * )
     *
     * @var object
     */
    public $response;

    /**
     * @OA\Property(
     *      title="errors",
     *      type="object"
     * )
     *
     * @var ?object
     */
    public $errors;
}
