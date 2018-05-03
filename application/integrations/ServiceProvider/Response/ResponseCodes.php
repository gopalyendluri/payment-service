<?php

namespace PaymentService\ServiceProvider\Response;

/**
 * Class ResponseCodes
 *
 * @package PaymentService\ServiceProvider\Response
 */
class ResponseCodes
{

    public static $CODES = array(
        404 => 'CRITICAL',
        400 => 'MEDIUM',
        300 => 'MINOR',
    );

}
