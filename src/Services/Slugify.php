<?php

namespace App\Services;

class Slugify
{
    public const DIVIDER = '-';
    public function generate(string $input): string
    {
        // replace non letter or digits by divider
        $input = preg_replace('~[^\pL\d]+~u', self::DIVIDER, $input);
        // transliterate
        $input = iconv('utf-8', 'us-ascii//TRANSLIT', $input);
        // remove unwanted characters
        $input = preg_replace('~[^-\w]+~', '', $input);
        // trim
        $input = trim($input, self::DIVIDER);
        // remove duplicate divider
        $input = preg_replace('~-+~', self::DIVIDER, $input);
        // lowercase
        $input = strtolower($input);
        if (empty($input)) {
            return 'n-a';
        }
        return $input;
    }
}
