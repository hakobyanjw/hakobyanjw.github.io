<?php

class Edit extends Controller{
    
    public static function GetTask($value){
        if(isset($_GET['id']) and isset($_SESSION["username"])){
            
            $id=preg_replace("/[^0-9]/", '', $_GET['id']);
            if($id==0){
                echo "<script>window.location.href='task';</script>";
            }else{
                $test=self::query("SELECT $value FROM tasks WHERE id='$id'");
                $data=$test[0][$value];
                echo $data;
            }
        }
    }
    public static function UpdateTask(){
        if(!isset($_SESSION["username"])){
            echo"<script>window.location.href='login';</script>";
        }
        if( isset($_POST['id'])  and isset($_SESSION["username"])){
            
            $id=$_POST['id'];
            $id=htmlspecialchars($id);
            $name=$_POST['name'];
            $name=htmlspecialchars($name);
            $email=$_POST['email'];
            $email=htmlspecialchars($email);
            $phone=$_POST['phone'];
            $phone=htmlspecialchars($phone);
            $img=$_POST['img'];
            $img=htmlspecialchars($img);
            $date_exp=$_POST['date_exp'];
            $date_exp=htmlspecialchars($date_exp);
            $header=$_POST['header'];
            $header=htmlspecialchars($header);
            $description=$_POST['description'];
            $description=htmlspecialchars($description);
            $text=$_POST['text'];
            $text=htmlspecialchars($text);
            $done=$_POST['done'];
            $done=htmlspecialchars($done);
            $date_mod=date("Y-m-d");
            
            $update=self::query("UPDATE tasks set name='$name',email='$email',phone='$phone',img='$img',date_exp='$date_exp',date_mod='$date_mod',header='$header',description='$description',text='$text',done='$done' where id = $id");
            
            echo "<script>window.location.href='taskview?id=$id';</script>";
            
        }
    }
    public static function checkifisset(){
            
            $id=preg_replace("/[^0-9]/", '', $_GET['id']);
            if($id==0){
                echo "<script>window.location.href='task';</script>";
            }else{
            $query=self::query("SELECT name FROM tasks WHERE id=$id");
                if(!$query){
                    echo "<script>window.location.href='task';</script>";
                }
            }
    }
}


?>