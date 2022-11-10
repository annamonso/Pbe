<?php
    session_start();

    $conn=mysqli_connect("localhost","root","","atenea");
    if ($conn) {
        echo 'Connected successfully <br>';
        //echo "<br>"; &name=Puzzle1"
    }
    $idEstudiant;
    $info= "horari";
    $taula=explode("?", $info);
    $sql= "SELECT * FROM $taula[0] ";
    if($taula[1]){
        $sql=$sql."WHERE ";
    }
    //$sql=$sql+"WHERE";
    $filtres=explode("&",$taula[1]);
    //$sql=implode(' AND ',$filtres);

    $i=0;
    while($filtres[$i]){
        if($i>0){
            $sql=$sql." AND ";
        }
        $filtres2=explode("=",$filtres[$i]);
        $sql=$sql.$filtres2[0]."='".$filtres2[1]."'";
        $i=$i+1;
    }
    //echo $sql;
    echo '<br>';
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result)){
        echo $row[0];
        echo $row[1];
        echo $row[2];
        echo '<br>';
    }


    
?>