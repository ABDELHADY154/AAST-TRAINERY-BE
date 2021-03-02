<?php


namespace App\Virtual\Resources\Common;

/**
 * @OA\Schema(
 *     title="success accepted 202",
 *     description="success accepted 202",
 *     type="object",
 * )
 */
class SuccessAcceptedVirtual
{
    /**
     * @OA\Property(
     *      title="status",
     *      description="Status",
     *      example=201
     * )
     *
     * @var bool
     */
    public $status;

    /**
     * @OA\Property(
     *      title="message",
     *      description="message",
     *      example="success created"
     * )
     *
     * @var string
     */
    public $message;

    /**
     * @OA\Property(
     *      title="response",
     *      type="object",
     *      description="data object",
     *      @OA\Property(
     *          property="data",
     *          type="object",
     *          description="null or data sent in the request body"
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
