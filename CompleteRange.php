<?php 
class CompleteRange {
    public function __construct()
    {
        
    }
    public function build($arrNumbers) 
    {
        $minNumber = min($arrNumbers);
        $maxNumber = max($arrNumbers);
        $arrNumbersFilled = array(); 
        for ($i=$minNumber; $i <= $maxNumber; ) { 
            $arrNumbersFilled[] = $i;
            $i++; 
        }
        return $arrNumbersFilled; 
    }
}

$completeRange = New CompleteRange(); 
$arrNumbers = array(2,4,9);
$result = $completeRange->build($arrNumbers); 
print_r($result); 
?>