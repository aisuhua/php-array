<?php
namespace Aisuhua;

/**
 * Class PHPArray
 *
 * 对 PHP 数组的常用操作进行封装
 *
 * @package Aisuhua\PHPArray
 */
class PHPArray
{
    /**
     * 返回数组中指定的一列
     *
     * @see https://github.com/ramsey/array_column
     *
     * @param array $array
     * @param string $columnKey
     * @param string $indexKey
     *
     * @return array
     */
    public static function arrayColumn($array, $columnKey, $indexKey = null)
    {
        $result = array();

        if(!empty($array)) {
            if (!function_exists('array_column')) {
                foreach ($array as $subArray) {
                    if (!is_array($subArray)) {
                        continue;
                    } elseif (is_null($indexKey) && array_key_exists($columnKey, $subArray)) {
                        $result[] = $subArray[$columnKey];
                    } elseif (array_key_exists($indexKey, $subArray)) {
                        if (is_null($columnKey)) {
                            $result[$subArray[$indexKey]] = $subArray;
                        } elseif (array_key_exists($columnKey, $subArray)) {
                            $result[$subArray[$indexKey]] = $subArray[$columnKey];
                        }
                    }
                }
            } else {
                $result = array_column($array, $columnKey, $indexKey);
            }
        }

        return $result;
    }

    /**
     * 把对象转为数组
     *
     * @see http://php.net/manual/zh/function.array-map.php#80958
     * @see http://www.phpddt.com/php/array-to-object.html
     * @see http://gom.hatenablog.com/entry/20090919/1253368869
     *
     * @param object $obj
     *
     * @return array
     */
    public static function objectToArray($obj)
    {
        $arr = is_object($obj) ? get_object_vars($obj) : $obj;

        if (is_array($arr)) {
            return array_map(array(
                __CLASS__,
                __FUNCTION__
            ), $arr);
        } else {
            return $arr;
        }
    }
}
