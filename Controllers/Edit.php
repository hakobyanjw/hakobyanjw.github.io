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
    public static function ErrorMessages(){
        if(isset($_GET['nameerror']) or isset($_GET['emailerror']) or isset($_GET['headererror']) or isset($_GET['descriptionerror']) or isset($_GET['texterror'])){
            echo "<div class='taskexist'>";
            if(isset($_GET['nameerror'])){
                echo "Wrong Name Format.<br>";
            }
            if(isset($_GET['emailerror'])){
                echo "Wrong E-mail Format.<br>";
            }
            if(isset($_GET['headererror'])){
                echo "Please type any text.<br>";
            }
            if(isset($_GET['descriptionerror'])){
                echo "Please type any description.<br>";
            }
            if(isset($_GET['texterror'])){
                echo "Please type any text.<br>";
            }
            echo "</div>";
        }
    }
    public static function UpdateTask(){
        if(!isset($_SESSION["username"])){
            echo"<script>window.location.href='login';</script>";
        }
        if( isset($_POST['id'])  and isset($_SESSION["username"])){
            
            $edit=new Edit;
            
            $id=$_POST['id'];
            $id=htmlspecialchars($id);
            $name=$_POST['name'];
            $name=$edit->checkinput($name);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
              $nameError = "&nameerror";
            }
            $email=$_POST['email'];
            $email=$edit->checkinput($email);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailError = "&emailerror";
            }
            $phone=$_POST['phone'];
            $phone=$edit->checkinput($phone);
            $img=$_POST['img'];
            $img=$edit->checkinput($img);
            $date_exp=$_POST['date_exp'];
            $date_exp=$edit->checkinput($date_exp);
            $header=$_POST['header'];
            $header=$edit->checkinput($header);
            if (empty($_POST["header"])) {
                $headerError = "&headererror";
              }
            $description=$_POST['description'];
            $description=$edit->checkinput($description);
            if (empty($_POST["description"])) {
                $descriptionError = "&descriptionerror";
              }
            $text=$_POST['text'];
            $text=$edit->checkinput($text);
            if (empty($_POST["text"])) {
                $textError = "&texterror";
              }
            $done=$_POST['done'];
            $done=$edit->checkinput($done);
            $date_mod=date("Y-m-d");
            
            if($nameError or $emailError or $headerError or $descriptionError or $textError){
                if($nameError){$error1=$nameError;}else{$error1="";}
                if($emailError){$error2=$emailError;}else{$error2="";}
                if($headerError){$error3=$headerError;}else{$error3="";}
                if($descriptionError){$error4=$descriptionError;}else{$error4="";}
                if($textError){$error5=$textError;}else{$error5="";}
                echo "<script>window.location.href='edit?id=$id$error1$error2$error3$error4$error5';</script>";
            }else{
                $update=self::query("UPDATE tasks set name='$name',email='$email',phone='$phone',img='$img',date_exp='$date_exp',date_mod='$date_mod',header='$header',description='$description',text='$text',done='$done' where id = $id");
            
                echo "<script>window.location.href='taskview?id=$id';</script>";
            }
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