
<?php 

$exclude_list = array(".", "..", "example.txt"); 
if (isset($_GET["dir"])) { 
  $dir_path = $_SERVER["DOCUMENT_ROOT"]."/".$_GET["dir"]; 
  chdir($dir_path); 
  echo getcwd() . "<br><br>"; 
} 
else { 
  $dir_path = $_SERVER["DOCUMENT_ROOT"]."/"; 
  chdir($dir_path); 
  echo getcwd() . "<br><br>"; 
} 
//-- until here 
function dir_nav() { 
  global $exclude_list, $dir_path; 
  $directories = array_diff(scandir($dir_path), $exclude_list); 
  echo "<ul style='list-style:none;padding:0'>"; 
  foreach($directories as $entry) { 
    if(is_dir($dir_path.$entry)) { 
      echo "<li style='margin-left:1em;'>[`] <a href='?dir=".$_GET["dir"].$entry."/"."'><font color='black'><b>".$entry."</b></font></a></li>"; 
    } 
  } 
  echo "</ul>"; 
  //-- separator 
  echo "<ul style='list-style:none;padding:0'>"; 
  foreach($directories as $entry) { 
    if(is_file($dir_path.$entry)) { 
      echo "<li style='margin-left:1em;'>[ ] <a href='?file=".$_GET["dir"].$entry."'><font color='green'>".$entry."</font></a></li>"; 
    } 
  } 
  echo "</ul>"; 
} 
dir_nav(); 
//-- optional placement 
if (isset($_GET["file"])) { 
  echo "<div style='margin:1em;border:1px solid Silver;'>"; 
  highlight_file($dir_path.$_GET['file']); 
  echo "</div>"; 
} 
//-- until here 
//-- 
//-- Because I love php.net 
?>