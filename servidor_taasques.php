<?php
    session_start();

    $conn=mysqli_connect("localhost","root","","atenea");
    if ($conn) {
        echo 'Connected successfully <br>';
       
    }
    /*Filtres a fer:
        - Limit de tasques timetables?limit=1 // tasks?date[gte]=now&limit=1
        - date[gte] tasques a partir de data    tasks?date[gte]=now&limit=1
        - mark[lt] nota mes baixa que marks?mark[lt]=5
        - mark[ht] nota mes alta que  marks?mark[ht]=5
        - hour[gt] mes tard q aquesta hora timetables?day=Fri&hour[gt]=08:00
        */
    // "tasks?limit=1"
    $idEstudiant;
    $info= "tasks?date[gte]=2022-11-2&limit=1";
    $taula=explode("?", $info);
    $sql= "SELECT * FROM $taula[0] ";
    if($taula>1){
        if($taula[1]){
            $sql=$sql."WHERE ";
            
         }  
         $filtres=explode("&",$taula[1]);

        $i=0;
            while($filtres[$i]){
                 if($i>0){
                      $sql=$sql." AND ";
                      
                 }
                $filtres2=explode("=",$filtres[$i]);
                
                if(str_contains($filtres[$i],'[lt]')){
                    $sql=$sql."mark"." BETWEEN "."0 AND ".$filtres2[1];
   
                } 
                else if(str_contains($filtres[$i],'[ht]')){
                    $sql=$sql."mark"." BETWEEN ".$filtres2[1]." AND 10";

                }else if(str_contains($filtres[$i],'hour[gt]')){
                    $sql=$sql." hour > '".$filtres2[1]."'";
                    
                }else if(str_contains($filtres[$i],'date[gte]')){
                    $sql=$sql." date > '".$filtres2[1]."'";
                     //falta el now
                
                }else if(str_contains($filtres[$i],'limit')){
                    $sql=$sql." limit ".$filtres2[1];
                   
                
                }
                else{
                    $sql=$sql.$filtres2[0]."='".$filtres2[1]."'";

                }
                $i=$i+1;
                

            }
        
         echo $sql.'<br>';
    }
    echo '<br>';
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        echo $row[0];
        echo $row[1];
        echo $row[2];
        echo '<br>';
    }


    
?>