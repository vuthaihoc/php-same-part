<?php


class SamePart
{
    public static function sameStart(...$strings): string
    {
        foreach ($strings as $k => $string) {
            $strings[$k] = preg_split("//u", $string);
        }

        $common = self::sameStartItems(...$strings);

        return implode("", $common);
    }

    public static function sameEnd(...$strings): string
    {
        foreach ($strings as $k => $string){
            $strings[$k] = array_reverse(preg_split("//u", $string));
        }

        $common = self::sameStartItems(...$strings);

        return implode("", array_reverse($common));
    }

    protected static function sameStartItems(...$strings) : array{
        $common = array_shift($strings);
        foreach ($strings as $string) {
            $_common = [];
            $length = min(count($common), count($string));
            for ($i = 0; $i < $length; $i++) {
                if ($common[$i] == $string[$i]) {
                    $_common[] = $common[$i];
                } else {
                    break;
                }
            }
            $common = $_common;
            if (count($common) == 1) {
                return [];
            }
        }
        return $common;
    }

}