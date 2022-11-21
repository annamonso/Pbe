<?php
    session_start();

    $conn=mysqli_connect("localhost","root","","atenea");

    $uid = $_SERVER['PATH_INFO'];
    $uid = str_replace("/","",$uid);
    //$uid = 1234;

    $sql = "SELECT * FROM estudiants WHERE uid='$uid'";
    $res=mysqli_query($conn,$sql);
    
    
    $array=array();
    if ( $row = $res->fetch_array(MYSQLI_BOTH)){
        $_SESSION['S_idES']=$row[0];
        echo $_SESSION['S_idES'];
        $array['IdEstudiant']=$row[0];
        $array['Username']=$row['Nom'];
        
    }else{
        $array['Username']='ERROR';
    }
    $json=json_encode($array);
    echo $json;
    


?>
