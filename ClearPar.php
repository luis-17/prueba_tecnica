<?php 
class ClearPar {
    public function __construct()
    {
        
    }
    public function build($parentesis) 
    {
        $arrMasterPars = array('(',')'); 
        // LIMPIEZA DE IGUALES: KEYS A ELIMINAR  
        $arrKeysToDelete = array(); 
        $arrAllPars = str_split($parentesis);
        foreach ($arrAllPars as $key => $val) { 
            $keyMasUno = $key+1; 
            if( array_key_exists($keyMasUno, $arrAllPars) ){ 
                if( $arrAllPars[$key] === $arrAllPars[$keyMasUno] ){
                    $arrKeysToDelete[] = $key;
                }
            }
        }
        // LIMPIEZA DE IGUALES: ELIMINACIÓN DE KEYS 
        foreach ($arrKeysToDelete as $key => $val) {
            unset($arrAllPars[$val]); 
        }
        // MOSTRAMOS SOLO PAREJA DE PARENTESIS 
        $arrParentesis1 = $arrAllPars;
        $arrParentesis2 = $arrAllPars;
        $strPars = NULL;
        foreach ($arrParentesis1 as $key1 => $val1) { 
            $parBool1 = FALSE;
            $parBool2 = FALSE;
            if($val1 === $arrMasterPars[0]){ 
                $parBool1 = TRUE;
                foreach ($arrParentesis2 as $key2 => $val2) { 
                    if( $val2 === $arrMasterPars[1] && $key2 > $key1){
                        $parBool2 = TRUE;
                    }
                }
                if( $parBool1 && $parBool2 ){ 
                    $strPars .= $arrMasterPars[0].$arrMasterPars[1]; 
                }
            }
        }
        return $strPars; 
    }
}

$clearPar = New ClearPar(); 
$paramParentesis = '()())()'; // PROBAR CON TODAS LAS POSIBILIDADES 
$result = $clearPar->build($paramParentesis); 
echo $result; 
?>