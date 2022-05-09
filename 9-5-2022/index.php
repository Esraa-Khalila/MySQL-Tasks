 
 <?php
session_start();
define('SITURL','http://localhost:8080/mysql-Tasks/');
define('LOCALHOST','localhost');    
define('DB_USERNAME','root');
define('DB_PASSWORD', '');
define('DB_NAME','food-order1');
$conn =mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD)or die(mysqli_error());
$db_select = mysqli_select_db($conn , DB_NAME) or die(mysqli_error());
?>
<div class="container">
         <?php if (isset($_SESSION['add'])){
             echo $_SESSION['add'];
             unset($_SESSION['add']);
         }
         if (isset($_SESSION['upload'])){
             echo $_SESSION['upload'];
             unset($_SESSION['upload']);
         }
          ?>
          <br><br>
    <form method='POST' action='' class='form2' >
    <p>Welcome</p>
    <input type="text" placeholder="Title" name='title' required ><br><br>
    <div>
    <label>featured : </label>
    <input type="radio"  name='featured' value="Yes" >yes
    <input type="radio"  name='featured' value="No" >No<br><br>
    </div>
     <div>
    <label>active : </label>
    <input type="radio"  name='active' value="Yes" >yes
    <input type="radio"  name='active' value="No" >No<br><br>
    </div><br>
    <input type="submit" name='submit' value="submit" style='color :black'><br>

  </form>

  <div class="drops">
    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>
  </div>
</div>
              
             </div>
    </div>

<?php 
if(isset($_POST['submit']))
{

 $title = $_POST['title'];
if(isset($_POST['featured']))
{
$featured=$_POST['featured'];
}
else{
$featured='No';
}

if(isset($_POST['active']))
{
$active=$_POST['active'];
}
else{
$active='No';
}




$data="INSERT INTO `tbl-category` SET
title='$title',

featured='$featured',
active='$active'

";
$db = mysqli_query($conn , $data);
if($db==TRUE){
   $_SESSION['add']="Gategory Added";
   
   
}else {
  $_SESSION['add']="Gategory Not Added";

 
}
} 
?>