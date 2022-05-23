<?php 
session_start();

if(isset($_SESSION['usersession']) && $_SESSION['usersession']=="admin")
{ 
include 'include/dashboard-sidebar.php';
if($_SESSION['AdminCategory']== "SUPER"){
require "dbcontroller.php";
$db_handle = new DBController();
$msg ="";
if(isset($_POST['delete']))
{
  $peopleid = $_POST['peopleid'];
  $deletesql = "DELETE FROM person WHERE id='$peopleid'";
  $resultdelete = $db_handle->deleteQuery($deletesql);
  if($resultdelete)
  {

    echo "<script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>";
  }
  else {
    $deletechild = "DELETE FROM parent WHERE chid='$peopleid'";
    $resultdeletechild = $db_handle->deleteQuery($deletechild);
    if($resultdeletechild)
    {
      $deletesqlfinal = "DELETE FROM person WHERE id='$peopleid'";
      $resultdeletefinal = $db_handle->deleteQuery($deletesqlfinal);
      if($resultdeletefinal)
      {
        echo "<script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        </script>";
      }
      else {
        $msg.=" 
    <p class='text-center' style='color:red;'>Sorry this people have child and cannot be deleted</p>
    <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>";
      }
     
    }
    else {
      $msg.=" 
    <p class='text-center' style='color:red;'>Sorry this people have child and cannot be deleted</p>
    <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>";
    }
    
  }
     
}
$result = $db_handle->rawQuery("SELECT * FROM superuser");

?>
<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<div class="home-content">
<div><?php echo $msg; ?></div>

<a href="add-admins.php"><button type="button" class="btn btn-primary">
  Add Admin
</button> </a>
   <!--<div class="search-box">-->
   <!--<input type="search" id="myInput" onkeyup="searchstudent(this.value);" placeholder="Search for names.."> -->

   <!--<ul class="auto-complete" id="auto_student">-->
   <!--</ul>-->
   <!--</div>-->
   
     <table class="table" id="myTable">
    <tr>
        <th> S No.</th>
        <th>Full Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Reg_Date</th>
        <th class="text-center" colspan=3>Action</th>
    </tr>
    <?php
    $i=1;
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $i; ?></td>
<td><?php $name = $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];   echo $name; ?></td>
<td><?php echo $row['mobile'] ?></td>
<td><?php echo $row['mail'] ?></td>
<td><?php echo $row['RegDate']; ?></td>
<td><a>  <i class='bx bx-show'></i></a>
</td>
<td>


</td>

    <tr>
<?php
    $i++;
}
    ?>
 
    </table>
    </div>
    </div>
    <script>
    function confirmmsg(param) {
        let confirmAction = confirm("Are you sure to delete "+param+" ?");
        if (confirmAction) {
          return true;
        } else {
          return false;
        }
        
    }
    </script>
    <script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>

    <?php include 'include/dashboard-footer.php';
}
else
{
  echo "<h3 style='text-align:center'>You donot have authority to access this panel</h3>";
}
    }
    else {
        header('location:index.php');
    } ?>

