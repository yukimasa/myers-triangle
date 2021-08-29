<?php

declare(strict_types=1);

namespace Myers;

class Checker
{
    // 引数と戻り値は変更してはいけない
    public static function apply(string $v): string
    {
        $reg = "/^([1-9]\d*|0)(\.\d+)? ([1-9]\d*|0)(\.\d+)? ([1-9]\d*|0)(\.\d+)?$/";
        if (!preg_match($reg, $v)) {
            // ３つの整数を半角スペース区切りで入力してください。
            return '不成立';
        }

        $sides = explode(' ', $v);

        if (in_array(0, $sides)) {
            // 0を含んでいる
            return '不成立';
        }

        $sameValues = array_count_values($sides);
        $numberOfSameValues = count($sameValues);

        return match ($numberOfSameValues) {
            1 => "正三角形",
            2 => "二等辺三角形",
            3 => "不等辺三角形",
            default => "不成立",
        };
    }
}
