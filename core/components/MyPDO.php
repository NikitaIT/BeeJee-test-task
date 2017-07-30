<?php
/**
 * Created by PhpStorm.
 * User: NIKIT
 * Date: 30.07.2017
 * Time: 1:14
 */

namespace testtask\core\components;


use Couchbase\Exception;

class MyPDO extends \PDO
{
    public function __construct($file = ROOT.'/my_setting.ini')
    {
       // print_r(parse_ini_file($file, TRUE));
        if (!$settings = parse_ini_file($file, TRUE)) throw new exception('Unable to open ' . $file . '.');

        $dns = $settings['database']['driver'] .
            ':host=' . $settings['database']['host'] .
            ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
            ';dbname=' . $settings['database']['schema'];

        parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
    }
}