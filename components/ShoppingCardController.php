<?php

class ShoppingCardController
{
    public $data;

    function __construct()
    {
        $this->data = Db::getData('main');
    }

    public function actionShoppingCard()
    {
        /**
         * @param float $num
         *
         * @return float
         */
        function chekNum(float $num):float {
            $temp = strval($num);
            $arr = explode('.', $temp);
            if ($arr[1][1] > 0 && $arr[1][1] <= 5) {
                $arr[1][1] = 5;
                $temp = implode('.', $arr);
                $value = floatval($temp);
                return $value;
            } elseif ($arr[1][1] > 5) {
                $value = round($num, 1);
                return $value;
            } else {
                return $num;
            }
        }

        $data = $this->data;
        $count1 = count($data);
        for ($i=0; $i < $count1; $i++) {
            $count2 = count($data[$i]);
            $tempTaxes = 0;
            $tempTotal = 0;
            for ($j=0; $j < $count2; $j++) {
                $taxesImport = 0;
                $taxesLimited = 0;
                if ($data[$i][$j]['import']) {
                    $temp = $data[$i][$j]['price'] * 0.05;
                    $value = round($temp, 2);
                    $taxesImport = chekNum($value);
                };
                if (!$data[$i][$j]['limited']) {
                    $temp = $data[$i][$j]['price'] * 0.1;
                    $value = round($temp, 2);
                    $taxesLimited = chekNum($value);
                };
                $data[$i][$j]['priceTaxes'] = $data[$i][$j]['price'] + $taxesImport + $taxesLimited;
                $data[$i][$j]['taxes'] = $taxesImport + $taxesLimited;
                $tempTaxes += $data[$i][$j]['taxes'];
                $tempTotal += $data[$i][$j]['priceTaxes'];
            }
            $data[$i]['salesTaxes'] = $tempTaxes;
            $data[$i]['total'] = $tempTotal;
        }
        
        require_once(ROOT . '/resources/views/card.php');
        return true;
    }

}
