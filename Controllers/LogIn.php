<?php

class LogIn extends Controller{
  
    function __construct() {
		  parent::__construct();
		  Session::init();
	}
	
	public static function logout()
	{
        if(isset($_GET['logout'])){
          session_unset();
          echo"<script>window.location.href='task';</script>";
        }
	}
	public static function LogInRun()
	{
		if(isset($_POST['username'])){
		    
    		$username = trim($_POST['username']);
            $username = htmlspecialchars($username);
    		$password = trim($_POST['password']);
            $password = htmlspecialchars($password);
    		
    		$res= self::query("SELECT * FROM `users` WHERE username = '$username' AND password = '$password'");
    		
    		if ($res["0"]['username']) {
    			$_SESSION["username"] = "$username";
    		} else {
    		    echo "<div class='col-md-6 offset-md-3 loginerror'>Login Error.</div>";
    		}
		}
		if(isset($_SESSION["username"])){
		    echo"<script>window.location.href='task';</script>";
		}
		
	}
	public static function checkLoginForEdit(){
            if(isset($_SESSION["username"])){
                echo "<a href='edit?id=".$_GET['id']."'  class='list-group-item list-group-item-action list-group-item-light p-3'>Edit Task</a>";
            }
    }
    public static function checkLogin(){
            if(isset($_SESSION["username"])){
                echo "<a href='/login?logout=true' class='list-group-item list-group-item-action list-group-item-light p-3'>Log Out ".$_SESSION["username"]."</a>";
            }else{
                echo "<a href='/login' class='list-group-item list-group-item-action list-group-item-light p-3'>Log In</a>";
            }
    }
 
}


?>