<?php
/**
 * Created by PhpStorm.
 * User: YASIN
 * Date: 18.02.2019
 * Time: 23:42
 */
namespace App;
class Helper{

    protected static $_counter;
    protected static $data=array();
    public static function fileNameGenerate($path, $name_ext, $ext, $number = '') {
        $name = str_replace('.' . $ext, '', $name_ext);


        $name = str_slug($name);

        if (substr($path, -1) != '/') {
            $path = $path . '/';

        }
        if (file_exists($path . $name . $number . '.' . $ext)) {
            self::$_counter++;
            return self::fileNameGenerate($path, $name . '.' . $ext, $ext, self::$_counter);
        }
        return $name . self::$_counter . '.' . $ext;
    }

}
