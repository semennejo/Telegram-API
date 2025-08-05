<?php

declare(strict_types=1);

namespace Telegram\utils;

class Utils {

    public static function cleanArray(array &$array) : void {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                Utils::cleanArray($value);
                $array[$key] = $value;
            }elseif ($value === null) {
                unset($array[$key]);
            }
        }
    }
}