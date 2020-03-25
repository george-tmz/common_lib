<?php

namespace georgeT\CommonLib;

/**
 * Class RegexCreditCode
 * @package georgeT\common_lib
 * @author George
 * @date 2020/3/25
 * @time 10:50
 * 统一社会信用代码是新的全国范围内唯一的、始终不变的法定代码标识。
 * 由18位数字（或大写拉丁字母）组成
 * 第一位是           登记部门管理代码
 * 第二位是           机构类别代码
 * 第三位到第八位是   登记管理机关行政区域码
 * 第九位到第十七位   主体标识码（组织机构代码）
 * 第十八位           校验码
 * 校验码按下列公式计算：
 * C18 = 31-MOD(∑Ci*Wi,31)(1)
 * MOD  表示求余函数；
 * i    表示代码字符从左到右位置序号；
 * Ci   表示第i位置上的代码字符的值，采用附录A“代码字符集”所列字符；
 * C18  表示校验码；
 * Wi   表示第i位置上的加权因子，其数值如下表：
 * i 1 2 3 4  5  6  7  8  9  10 11 12 13 14 15 16 17
 * Wi 1 3 9 27 19 26 16 17 20 29 25 13  8 24 10 30 28
 * 当MOD函数值为0（即 C18 = 31）时，校验码用数字0表示。
 */
class RegexCreditCode
{
    /**
     * @param string $code
     * @return bool
     * @annotation
     */
    public static function isValid(string $code)
    {
        $wi = [1, 3, 9, 27, 19, 26, 16, 17, 20, 29, 25, 13, 8, 24, 10, 30, 28];
        $tokens = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'T', 'U', 'W', 'X', 'Y'];
        if (strlen($code) != 18) {
            return false;
        }
        $checkSum = 0;
        for ($i = 0; $i < 17; $i++) {
            $ci = array_search($code[$i], $tokens);
            $checkSum += intval($ci) * $wi[$i];
        }

        $mod = $checkSum % 31;
        if ($mod == 0) {
            $token = 0;
        } else {
            $token = $tokens[31 - $mod];
        }

        $lastChar = strtoupper($code[17]);

        if ($lastChar != $token) {
            return false;
        }
        return true;
    }
}