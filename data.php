<?php 
$sum=0;
session_start();

if(isset($_POST["action"])){
    if($_POST["action"]=="refresh"){
        session_destroy();
    }
}

if(isset($_POST["action"]) && isset($_POST["data"])){
    $check=$_POST["action"];
    $value=$_POST["data"];
    if($check=="+"){
        add($value,$sum);
    }
    if($check=="-"){
        sub($value,$sum);
    }
    if($check=="*"){
        mul($value);
    }
    if($check=="/"){
        div($value);
    }
}


function add($value){
    if(isset($_SESSION["value"])){
        $_SESSION['value']+=intval(implode($value));
        echo( $_SESSION['value']);
    }
   else{
       $_SESSION["value"]=0;
       $_SESSION['value']+=intval(implode($value));
       echo( $_SESSION['value']);
   }
}


function sub($value){
    if(isset($_SESSION["value"])){
        $_SESSION['value']=abs($_SESSION['value'])-abs(intval(implode($value))) ;
        echo($_SESSION['value']);
    }
   else{
       $_SESSION['value']=intval(implode($value))- $_SESSION['value'];
       echo( $_SESSION['value']);
   }
}


function mul($value){
    if(isset($_SESSION["value"])){
        $_SESSION['value']*=intval(implode($value));
        echo($_SESSION['value']);
    }
   else{
       $_SESSION["value"]=1;
       $_SESSION['value']*=intval(implode($value));
       echo( $_SESSION['value']);
   }
}


function div($value){
    if(isset($_SESSION["value"])){
        $_SESSION['value']=abs($_SESSION['value'])/abs(intval(implode($value))) ;
        echo($_SESSION['value']);
    }
   else{
       $_SESSION["value"]=1;
    $_SESSION['value']=intval(implode($value))/$_SESSION['value'];
       echo( $_SESSION['value']);
   }
}


?>