<?php

class Add extends Controller{
    
    public static function AddTask(){
            $add= new Add;
            
        if(isset($_POST['name'])){
        
            $name=$_POST['name'];
            $name=$add->checkinput($name);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
              $nameError = "Wrong Name Format.<br>";
            }
            
            $email=$_POST['email'];
            $email=$add->checkinput($email);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailError = "Wrong E-mail Format.<br>";
            }
            
            $phone=$_POST['phone'];
            $phone=$add->checkinput($phone);
            $date_exp=$_POST['date_exp'];
            $date_exp=$add->checkinput($date_exp);
            $header=$_POST['header'];
            $header=$add->checkinput($header);
            if (empty($_POST["header"])) {
                $headerError = "Please type any Title.<br>";
              }
            
            $description=$_POST['description'];
            $description=$add->checkinput($description);
            if (empty($_POST["description"])) {
                $descriptionError = "Please type any description.<br>";
              }
              
            $text=$_POST['text'];
            $text=$add->checkinput($text);
            if (empty($_POST["text"])) {
                $textError = "Please type any text.<br>";
              }
              
            $date_creat=date("Y-m-d");
            
            if($nameError or $emailError or $headerError or $descriptionError or $textError){
                echo "<div class='taskexist'>";
                if($nameError){echo $nameError;}
                if($emailError){echo $emailError;}
                if($headerError){echo $headerError;}
                if($descriptionError){echo $descriptionError;}
                if($textError){echo $textError;}
                echo "</div>";
                
            }else{
            $test=self::query("SELECT id FROM tasks WHERE header='$header' AND description='$description'");

                if (!$test) {

                $query=self::query("INSERT INTO tasks (header, description, text, date_creat, date_exp, name, phone, email)VALUES ('$header', '$description', '$text', '$date_creat', '$date_exp', '$name', '$phone', '$email')");

                  echo "<script>window.location.href='task?TaskAdded=true';</script>";
                } else {
                  echo "<div class='taskexist'>Task exist. Please create another task.</div>";
                }
            }
        }
    }
}


?>