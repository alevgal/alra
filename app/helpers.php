<?php

/**
 * Theme helpers.
 */

namespace App;

use function Roots\view;

function formatPhone( $phone )
{
    $phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
    try {
        $numberProto = $phoneUtil->parse($phone, "AU");
        return $phoneUtil->format($numberProto, \libphonenumber\PhoneNumberFormat::E164);
    } catch (\libphonenumber\NumberParseException $e) {
        return $phone;
    }
}

function getFirstName( $fullname )
{
    $pieces = explode(' ', $fullname);
    return isset( $pieces[0] ) ? $pieces[0] : $fullname;
}
