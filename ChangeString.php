<?php 
class ChangeString {
    public function __construct()
    {
        
    }
    public function build($text)
    {
        $strAlphabetic = "a,b,c,d,e,f,g,h,i,j,k,l,m,n,ñ,o,p,q,r,s,t,u,v,w,x,y,z"; 
        $arrAlphabetic = explode(',', $strAlphabetic);
        $arrText = str_split($text); 
        $textChanged = NULL;
        foreach ($arrText as $key => $row) { 
            // si es una letra(a-z) 
            if( in_array(strtolower($row), $arrAlphabetic) ){ 
                // Hallamos el key en busqueda por valor 
                $selectKey = array_search(strtolower($row), $arrAlphabetic);
                $selectKeyMasUno = $selectKey + 1; 
                // si es letra mayúscula 
                if( ctype_upper($row) ){ 
                    if( array_key_exists($selectKeyMasUno, $arrAlphabetic) ){ 
                        $textChanged .= strtoupper($arrAlphabetic[$selectKeyMasUno]);
                    }else{
                        $textChanged .= strtoupper($arrAlphabetic[0]);
                    }
                }
                // si es letra minúscula
                if( ctype_lower($row) ){
                    if( array_key_exists($selectKeyMasUno, $arrAlphabetic) ){ 
                        $textChanged .= strtolower($arrAlphabetic[$selectKeyMasUno]);
                    }else{
                        $textChanged .= strtolower($arrAlphabetic[0]);
                    }
                }
            }
            // si es un espacio 
            if( empty(trim($row)) ){  
                $textChanged .= ' ';
            }
            // si es un número o caracter especial 
            if( is_numeric($row) || preg_match('/["\'^£$%&*()}{@#~?><>,|=_+¬-]/', $row) ){
                $textChanged .= $row;
            } 
        }
        return $textChanged;
    }
}
if($_POST){
    $changeString = New ChangeString(); 
    $result = $changeString->build($_POST['texto']); 
    echo $result; 
}else{ 
    $strHTML = '<form method="post" ><label> Ingrese texto: </label>';
    $strHTML .= '<input type="text" name="texto" placeholder="Ingrese texto" /> ';
    $strHTML .= '<input type="submit" value="PROCESAR"> </form>';
    echo $strHTML;
}
?>