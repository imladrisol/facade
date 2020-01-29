<?php

class FacadeCalculator{
    public $client;
    private $params;
    private function __construct(){}
    public static function getClient(){
        if($this->client === null){
            $this->client = new SoapClient('http://www.dneonline.com/calculator.asmx?WSDL');
        }
        return $this->client;
    }
    public function setParams($a, $b){
        $this->params = array('intA' => $a, 'intB' => $b);
    }
    public function add()
    {
        $objResult = $client->Add($this->$params);
        $result = $objResult->AddResult;
        return $result;
    }

    public function subtract()
    {
        $objResult = $client->Subtract($this->$params);
        $result = $objResult->SubtractResult;
        return $result;
    }
}




$client = FacadeCalculator::getClient();
$client->setParams(3, 20);
echo $client->add();
echo $client->subtract();