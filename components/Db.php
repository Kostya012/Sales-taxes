<?php

class Db
{

    public static function getData($nameFile)
    {
        $paramsPath = ROOT . '/db/' . $nameFile . '.php';
        $data = include($paramsPath);
        return $data;
    }

}
