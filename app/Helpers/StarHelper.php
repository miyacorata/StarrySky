<?php

if(!function_exists('separateString')){
    /**
     * 文字列の $position 文字目にスペースを入れる
     *
     * @param string $string
     * @param int $position
     * @param string $glue
     * @return string
     */
    function separateString(string $string, int $position, string $glue = ' '): string
    {
        $last = mb_substr($string,$position);
        $first = mb_substr($string,0,$position);
        return $first.$glue.$last;
    }
}
