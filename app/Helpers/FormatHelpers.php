<?php

namespace App\Helpers;

class FormatHelpers
{
    public static function formattingBoolean($booleanData)
    {
        return filter_var($booleanData, FILTER_VALIDATE_BOOLEAN) ? 1 : 0;
    }
}
