<?php
    $n1 = intval(fgets(STDIN));
    $n2 = intval(fgets(STDIN));
    $n3 = intval(fgets(STDIN));
    $n4 = intval(fgets(STDIN));
    
    $media = intval(($n1+$n2+$n3+$n4)/4) ;
    
    if($media<= 6){
        $status = 'Reprovado';
    }else if($media < 8.5){
        $status = 'Exame';
    }else{
        $status = 'Aprovado';
    }
    echo($status);
?>