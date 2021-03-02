<?php


namespace App\Virtual\Resources\Errors;


/**
 * @OA\Schema(
 *     title="response validation Error 422",
 *     description="response validation Error 422",
 *     type="object",
 * )
 */

class Response422Virtual
{
    /**
     * @OA\Property(
     *      title="status",
     *      description="Status",
     *      example=422
     * )
     *
     * @var bool
     */
    public $status;

    /**
     * @OA\Property(
     *      title="message",
     *      description="invalid data",
     *      example="The given data was invalid"
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
     *  @OA\Property(
     *      @OA\Property(property="email", type="array",
     *           @OA\Items(
     *               type="string", example="The email field is required"
     *           ),
     *       ),
     * )
     *
     * @var object
     */
    public $errors;
}
