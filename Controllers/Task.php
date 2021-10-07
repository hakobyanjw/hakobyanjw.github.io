<?php

class Task extends Controller {
    
    public static function sorttype($sorttype){
        if(isset($_GET["sort"])){
            $sort=htmlspecialchars($_GET["sort"]);
            $sorttype_r=$sorttype."_r";
            if($sort==$sorttype){
                echo $sorttype."_r";
            }else{
                echo $sorttype;
            }
        }else{
            echo $sorttype;
        }
    }
    public static function doTaskList($r,$type){
        
        $limit=3;
      
        if(isset($_GET["page"]) and is_numeric($_GET["page"])){
            $page=htmlspecialchars($_GET["page"]);
        }else{
            $page="1";
        }
        
        $start_from=($page-1)*$limit;
        
        if(isset($_GET["sort"])){
            $sort=htmlspecialchars($_GET["sort"]);
            if($sort=="name" or $sort=="email" or $sort=="header" or $sort=="done"){
            $sort=" ORDER BY $sort ASC LIMIT $start_from, $limit";
            }else if($sort=="name_r" or $sort=="email_r" or $sort=="header_r" or $sort=="done_r"){
                $sort=substr($sort, 0, -2);
                $sort=" ORDER BY $sort DESC LIMIT $start_from, $limit";
            }else{
                $sort=" ORDER BY id ASC LIMIT $start_from, $limit";
            }
        }else{
            $sort=" ORDER BY id ASC LIMIT $start_from, $limit";
        }
        $query=self::query("SELECT $type FROM tasks $sort ");
        
        $data=$query["$r"]["$type"];
        if($type=="done"){
            if($data=="true"){
                $data='<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
  <path d="M13.485 1.431a1.473 1.473 0 0 1 2.104 2.062l-7.84 9.801a1.473 1.473 0 0 1-2.12.04L.431 8.138a1.473 1.473 0 0 1 2.084-2.083l4.111 4.112 6.82-8.69a.486.486 0 0 1 .04-.045z"/>
</svg>';
            }else if($data=="false"){
                $data='<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
  <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
</svg>';
            }
            
        }
        echo $data;
    }
    public static function doTaskListPag(){
        
        $limit=3;
        if(isset($_GET["page"])){
            $page=htmlspecialchars($_GET["page"]);
        }else{
            $page="1";
        }
        $start_from=($page-1)*$limit;
        if(isset($_GET["sort"])){
            $sort=htmlspecialchars($_GET["sort"]);
            if($sort=="name" or $sort=="email" or $sort=="header" or $sort=="done"){
            $sortlink="&sort=$sort";   
            $sort=" ORDER BY $sort ASC LIMIT $start_from, $limit";
            }else if($sort=="name_r" or $sort=="email_r" or $sort=="header_r" or $sort=="done_r"){
                $sortlink="&sort=$sort";
                $sort=substr($sort, 0, -2);
                $sort=" ORDER BY $sort DESC LIMIT $start_from, $limit";
            }else{
                $sort=" ORDER BY id ASC LIMIT $start_from, $limit";
                $sortlink="";
            }
        }else{
            $sort=" ORDER BY id ASC LIMIT $start_from, $limit";
            $sortlink="";
        }
        
        
        $pagquery=self::query("SELECT id FROM tasks $sort ");
        
        $totalrow=count($pagquery);
        
        $sql=self::query("SELECT count(id) FROM tasks");
        $row=$sql["0"]["0"];
        $total_records=$row;
        $total_pages=ceil($total_records/$limit);
        $pagLink='?page=';
        
        for($i=1; $i<=$total_pages; $i++){
              if ($total_pages==1) {
                break;
                }
            $cube="<a href='$pagLink$i$sortlink'><div class='pagsquere'>$i</div></a>";
            echo $cube;
        }
        if($_GET['page']>$total_pages){
                echo "<script>window.location.href='task';</script>";
            }

    }
    public static function TaskAdded(){
            if(isset($_GET['TaskAdded'])){
                echo"<div class='taskadded'>Task Added.</div>";
            }
    }
    
}

?>