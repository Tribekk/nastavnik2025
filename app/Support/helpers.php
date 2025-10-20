<?php

use Illuminate\Support\Facades\Response;

if(!function_exists('numerify')) {
    function numerify(int $length = 5): string {
        $numbers = '0123456789';
        $charactersLength = strlen($numbers);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $numbers[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}

if(!function_exists('unFormatPhone')) {
    function unFormatPhone($phone): string {
        return str_replace(['(', ')', ' ', '-'], '', strval($phone));
    }
}

if(!function_exists('readDocument')) {
    function readDocument($filename, $contentType)
    {
        return Response::make(file_get_contents($filename), 200, [
            'Content-Type' => $contentType,
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }
}

if(!function_exists('num2word')) {
    function num2word(int $num, array $words) {
        $num = $num % 100;
        if ($num > 19) {
            $num = $num % 10;
        }
        switch ($num) {
            case 1: {
                return($words[0]);
            }
            case 2: case 3: case 4: {
            return($words[1]);
        }
            default: {
                return($words[2]);
            }
        }
    }
}

if(!function_exists('strArrToPath')) {
    function strArrToPath(string $arr, string $separator = '.') {
        return rtrim(
            str_replace('[', $separator,
            str_replace(']', '', $arr)),
            '.'
        );
    }
}

if(!function_exists('serializeArrayValue')) {
    function serializeArrayValue(array &$inputs, string $key, $removeHtmlTags = true) {
        if(isset($inputs[$key])) {
            $inputs[$key] = serializationString($inputs[$key], $removeHtmlTags);
        }
    }
}

if(!function_exists('serializationString')) {
    function serializationString($value, $removeHtmlTags = true) {
        if(is_string($value)) {
            $result = preg_replace('#<script(.*?)>(.*?)</script>#im', '', $value);
            $result = preg_replace('#<style(.*?)>(.*?)</style>#im', '', $result);
            if($removeHtmlTags) {
                $result = removeEmptyHtmlTags($result);
            }
            return $result;
        }

        return $value;
    }
}

if(!function_exists('removeEmptyHtmlTags')) {
    function removeEmptyHtmlTags($value): string
    {
        $exclude = '[[:space:]]|&nbsp;|&thinsp;|&ensp;|&emsp;|&\#8201;|&\#8194;|&\#8195;|<br[[:space:]]?/?>';

        $pattern = "#<([^>\s]+)[^>]*>(?:\s*{$exclude}\s*)*</\1>#mi";
        if (preg_match($pattern, $value)) {
            return removeEmptyHtmlTags(preg_replace($pattern, '', $value));
        }

        $patternIsEmpty = "#^(\s*{$exclude})*$#";
        return preg_match($patternIsEmpty, $value) ? "" : $value;
    }
}
