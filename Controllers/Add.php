<?php

class Add extends Controller{
    
    public static function AddTask(){
        if(isset($_POST['name'])){
            
            $name=$_POST['name'];
            $name=htmlspecialchars($name);
            $email=$_POST['email'];
            $email=htmlspecialchars($email);
            $phone=$_POST['phone'];
            $phone=htmlspecialchars($phone);
            $date_exp=$_POST['date_exp'];
            $date_exp=htmlspecialchars($date_exp);
            $header=$_POST['header'];
            $header=htmlspecialchars($header);
            $description=$_POST['description'];
            $description=htmlspecialchars($description);
            $text=$_POST['text'];
            $text=htmlspecialchars($text);
            $date_creat=date("Y-m-d");
            
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


?>