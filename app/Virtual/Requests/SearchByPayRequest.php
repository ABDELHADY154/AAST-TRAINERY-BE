<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student search by payment",
 *      description="Student search by payment body data",
 *      type="object",
 *      required={"payment"}
 * )
 */
class SearchByPayRequest
{
    /**
     * @OA\Property(
     *      title="payment",
     *      description="search by payment like Paid or un paid",
     *      example="Paid",
     * )
     *
     * @var string
     */
    public $payment;
}
