<?php
include("config.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Category</title>
    <link rel="stylesheet" href="outline.css">
</head>
<body style="background-color: white">
    <div class="heading">
        <h1>Delete Admin</h1>

    </div>

<!-- <div class="sidebar">
  <a  href="vehicle_category.php">Vehicle Category</a>
  <a href="add-vehicle.php">Vehicle Entry</a>
  <a href="invehicles.php">In Vehicles</a>
  <a href="out_vehicles.php">Out Vehicles</a>
  <a href="#income">Income</a>
</div> -->

<table style="border: 1px solid black   ;border-collapse : collapse ; position: absolute; margin-left: 17em;margin-top: 9em;width : 60%">
    <tr>
    <th style=" border: 1px solid black">ID</th>
    <th style=" border: 1px solid black">UserName</th>
    <th style=" border: 1px solid black">First Name</th>
    <th style="border: 1px solid black">Last Name</th>
    <th style=" border: 1px solid black">Mobile Number</th>

    </tr>
    <?php
    $conn=mysqli_connect("localhost","root","","parking1");
    if($conn ->connect_error)
    {
        die("Connection Failed:". $conn-> connect_error);
    }

    $sql="SELECT ID,username,firstname,lastname,mobile from admin";
    $result = $conn->query($sql);

    if($result->num_rows > 0)
    {
        while ($row=$result->fetch_assoc()){
            echo "<tr style='border: 1px solid black'><td style='border: 1px solid black'>". $row["ID"] . "</td><td style='border: 1px solid black'>". $row["username"] . "</td><td style='border: 1px solid black'>". $row["firstname"] ."</td><td style='border: 1px solid black'>". $row["lastname"] ."</td><td style='border: 1px solid black'>". $row["mobile"] . "</td></tr>";
        }
        echo "</table";
    }
    else{
        echo "0 result";
    }
     $conn-> close();
?>
</table>

<form action="" method="POST" >
    <div style="position : absolute ; margin-top: 30em ; margin-left: 35em">
<label>Admin ID</label>
    <select class="form-control" name="admin_id" id="admin_id" >
	<option value="0">Select Admin ID</option>
	<?php $query=mysqli_query($mysqli,"select * from admin");
	while($row=mysqli_fetch_array($query))
	{
	?>    
    <option value="<?php echo $row['ID'];?>"><?php echo $row['ID'];?></option>
    <?php } ?> 
	</select>
    <br>
    <input type="submit" name="submit" value="Change Password " style="position: absolute; margin-top : 5em" ><br>
    </div>

</form>
<div style="position : absolute ; margin-left:28em; margin-top:28em">
ENTER PRESENT PASSWORD<input type="text" name="currentpassword">
ENTER NEW PASSWORD<input type="text" name="newpassword">

</div>


<?php 
    if(isset($_POST['submit'])) 
    {
        $cpassword=$_POST['currentpassword'];
        $newpassword=$_POST['newpassword'];
        $adminid=$_POST['admin_id'];



        $retr=mysqli_query($mysqli,"SELECT ID from admin where ID='$adminid' AND password='$cpassword' ");
        $row=mysqli_fetch_array($retr);

        if($row>0){
            $result=mysqli_query($mysqli,"UPDATE admin SET password='$newpassword' where ID='$adminid' ");
        //    $msg="Your password has been updated with new one";


        }
        // else{
        //     $msg="Current password is wrong";
        // }
    if($result)
    {
        echo "Success";
    }
    else{
        echo "Failed";
    }
   
    }
    ?>

<!-- <a href="add_category.php" style="border : 10px solid black ;color : red; background-color : black ; position : absolute ;margin-top : 27em ; margin-left : 43em  ">ADD CATEGORY</a>

<a href="delete_category.php" style="border : 10px solid black ;color : red; background-color : black ; position : absolute ;margin-top : 30em ; margin-left : 43em  ">DELETE CATEGORY</a> -->


<a href="admin_login.php" style="border : solid 10px black; color: red">LOGIN</a>
    
</body>
</html>