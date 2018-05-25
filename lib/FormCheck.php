<?php
namespace lib;

class FormCheck
{
    private $array;
    private $arrayReturn;

    public function __construct($array)
    {
        $this->array = $array;
    }
    private function checkInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    private function checkArrayInput()
    {
        foreach ($this->array as $key => $value) {
            $this->arrayReturn[$key] = $this->checkInput($this->array[$key]);
        }
    }

    public function checkNumeric($amountFrom)
    {
        if (!preg_match("|^[\d]+$|", $amountFrom)) {
            $amountFrom = 0;
        }

        return $amountFrom;
    }

    public function getCheckInput()
    {
        $this->checkArrayInput();
        return $this->arrayReturn;
    }
}
