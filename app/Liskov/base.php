<?php
class objT{}
class objS extends objT{}
class Program{
    public function run(ObjT $obj)
    {

    }
}

$program = new Program();
$objT = new objT();
//$objS = new objS();
$program->run($objT);
//$program->run($objS);

