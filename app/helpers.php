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

function formatBracesLabel( $text )
{
    return str_replace(['(', ')'], ['<span class="text-battleship-grey fs-7 text-break d-inline-block">(', ')</span>'], $text);
}

function bodyPadding() {
    return ! in_array(true, [
        is_front_page(),
        is_page_template('template-jobs.blade.php'),
        is_page_template('template-recruiters.blade.php'),
        is_page_template('template-sectors.blade.php'),
        is_tax('sector')
    ]);
}
