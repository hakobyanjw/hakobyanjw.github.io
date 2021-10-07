<?php

class TaskView extends Controller {

        public static function doTask($col){
            
            if(isset($_GET['id']) and is_numeric($_GET['id'])){
                $id=$_GET['id'];
                if($id==0){
                    
                    echo "<script>window.location.href='task';</script>";
                    
                }else{
                    
                    $query=self::query("SELECT $col FROM tasks WHERE id=$id");
                    $answer=$query[0][$col];
                    if($answer=="false" and $col=="done"){
                        $answer="<i class='w3-opacity w3-red w3-padding taskfulfilled'>Task not fulfilled</i>";
                    }else if($answer=="true" and $col=="done"){
                        $answer="<i class='w3-opacity w3-green w3-padding taskaccomplished'>Task accomplished</i>";
                    }else if($col=="date_mod"){
                        if($answer!==null){
                            $answer="| Modified by Admin - ".$answer;
                        }
                    }else if(!$answer){
                        echo "<script>window.location.href='task';</script>";
                    }
                    
                    echo $answer;
                }
                
            }else{
                
                echo "<script>window.location.href='task';</script>";
                
            }
        
        }

}

?>