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

if(!function_exists('convertDateString')){
    /**
     * @param string $date 日付文字列
     * @param string $type 変換種別 ja/slash
     * @param bool $year 年の表示有無
     * @return string
     */
    function convertDateString(string $date, string $type = 'ja', bool $year = false): string
    {
        switch ($type){
            case 'ja':
                $format = ($year ? 'Y年' : '').'n月j日';
                break;
            case 'slash':
                $format = ($year ? 'Y/' : '').'m/d';
                break;
            case 'en':
                $format = 'F jS'.($year ? ', Y' : '');
                break;
            default:
                return false;
        }
        return date($format, strtotime($date));
    }
}
