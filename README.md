
# PHPArray

对 PHP 数组的常用操作进行封装，目前包括以下方法：`arrayColumn` （提供 PHP < 5.5.0 版本对 `array_column` 的支持）、`objectToArray` 把对象转换为数组。

其中，对 `array_column` 参照了 [array_column](https://github.com/ramsey/array_column)，如果只需要对 `array_column` 的支持，推荐直接引入原作者的库即可。

## 安装

通过 Composer 安装：

    php composer.phar require aisuhua/php-array
    
## 使用

    use Aisuhua\PHPArray
    
    array PHPArray::arrayColumn ( array $input , mixed $column_key [, mixed $index_key ] )
    
    array PHPArray::objectToArray ( object $obj )


## 例子

### arrayColumn()

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
    
//运行结果如下：
    
    Array
    (
        [2135] => John
        [3245] => Sally
        [5342] => Jane
        [5623] => Peter
    )
    
###  objectToArray()

    use Aisuhua\PHPArray;

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
    
//运行结果如下：
    
    Array
    (
        [cpu] => 英特尔 I3
        [screen] => 三星显示屏
        [cdrom] => 华硕刻录机
    )

### 其他

继续完善
