<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="Student Book Session",
 *      description="Student Book Session body data",
 *      type="object",
 *      required={"booking_date"}
 * )
 */
class SessionBookRequest
{
    /**
     * @OA\Property(
     *      title="booking date",
     *      description="booking date and time",
     *      example="05-03-2021 09:05:00",

     * )
     *
     * @var string
     */
    public $booking_date;
}
