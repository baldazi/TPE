<?php

namespace App\Models;


class ColorPaletteModel
{
    const RED = 'red';
    const YELLOW = 'yellow';
    const AQUA = 'aqua';
    const BLUE = 'blue';
    const BLACK = 'black';
    const LIGHT_BLUE = 'light-blue';
    const GREEN = 'green';
    const GRAY = 'gray';
    const NAVY = 'navy';
    const TEAL = 'teal';
    const OLIVE = 'olive';
    const LIME = 'lime';
    const ORANGE = 'orange';
    const FUCHSIA = 'fuchsia';
    const PURPLE = 'purple';
    const MAROON = 'maroon';

    const HEX_RED = '#dd4b39';
    const HEX_YELLOW = '#f39c12';
    const HEX_AQUA = '#00c0ef';
    const HEX_BLUE = '#0073b7';
    const HEX_BLACK = '#111111';
    const HEX_LIGHT_BLUE = '#3c8dbc';
    const HEX_GREEN = '#00a65a';
    const HEX_GRAY = '#d2d6de';
    const HEX_NAVY = '#001f3f';
    const HEX_TEAL = '#39cccc';
    const HEX_OLIVE = '#3d9970';
    const HEX_LIME = '#01ff70';
    const HEX_ORANGE = '#ff851b';
    const HEX_FUCHSIA = '#f012be';
    const HEX_PURPLE = '#605ca8';
    const HEX_MAROON = '#d81b60';

    public static function getColorNames()
    {
        return [
            1 => self::RED, 2 => self::YELLOW, 3 => self::AQUA, 4 => self::BLUE,
            5 => self::BLACK, 6 => self::LIGHT_BLUE, 7 => self::GREEN, 8 => self::GRAY,
            9 => self::NAVY, 10 => self::TEAL, 11 => self::OLIVE, 12 => self::LIME,
            13 => self::ORANGE, 14 => self::FUCHSIA, 15 => self::PURPLE, 16 => self::MAROON
        ];
    }

    public static function getColorHexValues()
    {
        return [
            self::HEX_RED, self::HEX_YELLOW, self::HEX_AQUA, self::HEX_BLUE,
            self::HEX_BLACK, self::HEX_LIGHT_BLUE, self::HEX_GREEN, self::HEX_GRAY,
            self::HEX_NAVY, self::HEX_TEAL, self::HEX_OLIVE, self::HEX_LIME,
            self::HEX_ORANGE, self::HEX_FUCHSIA, self::HEX_PURPLE, self::HEX_MAROON
        ];
    }
}
