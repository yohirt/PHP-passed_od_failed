<?php
/*
Jako pierwszy argument przyjmujemy hash, gdzie kluczami są imiona studentów, a wartościami otrzymana przez nich ilość punktów.
Drugim argumentem jest próg zdawalności.
Następnie grupujemy ich na tych, którzy zdali VS oblali i zwracamy odpowiedniego hash-a.
Należy zabezpieczyć się na możliwość, że próg lub ilość punktów będzie podana jako string, nie integer. 

hash = {"Mark" => 10, "Ellen" => 65, "Roger" => 20, "Mike" => 70}

PassedOrFailed.new(hash, "65").result
=> { passed: { "Ellen" => 65, "Mike" => 70 }, failed: { "Mark" => 10, "Roger" => 20 } }
*/



class PassedOrFailed{
    public $hash = array();
    public $prog;
    private $passed = array();
    private $failed = array();
    
    public function __construct(array $hash, int $prog){
        $this->hash = $hash;
        $this->prog = $prog;
    }
    
    public function sortPass()
    {
        foreach ($this->hash as $name => $point) {
            if($point >= $this->prog){
                $this->passed[$name] = $point;
            }else{
                $this->failed[$name] = $point;
            }
            
        }
        echo("<br> Osoby które zdały: <br>");
        print_r($this->passed);
        echo("<br> Osoby które nie zdały: <br>");
        print_r($this->failed);
        
    }
}

$hash = array("Mark" => 10, "Ellen" => 65, "Roger" => 20, "Mike" => 70);
$result = new PassedOrFailed($hash,"20");
$result->sortPass();