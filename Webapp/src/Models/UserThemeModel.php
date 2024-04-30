<?php

namespace App\Models;


class UserThemeModel
{
    const SKIN_BLUE = 'skin-blue';
    const SKIN_BLACK = 'skin-black';
    const SKIN_PURPLE = 'skin-purple';
    const SKIN_GREEN = 'skin-green';
    const SKIN_RED = 'skin-red';
    const SKIN_YELLOW = 'skin-yellow';

    public static function getThemes()
    {
        return [
            1 => self::SKIN_BLUE,
            2 => self::SKIN_BLACK,
            3 => self::SKIN_PURPLE,
            4 => self::SKIN_GREEN,
            5 => self::SKIN_RED,
            6 => self::SKIN_YELLOW
        ];
    }
}
