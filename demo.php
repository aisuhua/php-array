<?php
header('Content-Type:text/html;charset=utf-8');

require 'PHPArray.php';

use Aisuhua\PHPArray;

//记录
$records = array(
    array(
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ),
    array(
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 5342,
        'first_name' => 'Jane',
        'last_name' => 'Jones',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);


$result = PHPArray::arrayColumn($records, 'first_name', 'id');

print_r($result);

/*
Array
(
    [2135] => John
    [3245] => Sally
    [5342] => Jane
    [5623] => Peter
)
*/

class Computer
{
    public $cpu;
    public $screen;
    public $cdrom;

    public function __construct($cpu, $screen, $cdrom)
    {
        $this->cpu = $cpu;
        $this->screen = $screen;
        $this->cdrom = $cdrom;
    }
}

$computer = new Computer('英特尔 I3', '三星显示屏', '华硕刻录机');

$result = PHPArray::objectToArray($computer);

print_r($result);

/*
Array
(
    [cpu] => 英特尔 I3
    [screen] => 三星显示屏
    [cdrom] => 华硕刻录机
)
*/




