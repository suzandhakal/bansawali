<?php 
session_start();

if(isset($_SESSION['usersession']) && $_SESSION['usersession']=="admin")
{ 
  // echo $_SESSION['id'];
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
include 'include/dashboard-sidebar.php';
mysqli_set_charset( $db_handle->connectDB(), 'utf8');
$result = $db_handle->rawQuery("SELECT per.id,per.Pusta_Number,per.firstName,per.middleName,per.lastName,per.Gender,
per.Occupation,per.About_people,per.DateOfBirth,per.RegDate,per.activeStatus,per.slug,
father.firstName as fatherfirstname,father.middleName as fathermiddlename,
father.lastName as fatherlastname FROM person as per 
LEFT JOIN parent parid on per.id = parid.chid 
LEFT JOIN person father on parid.prid=father.id");

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

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"> People Entry</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div>
      <form action="AddMember.php" method="post" name="entry">
            <input class="input" type="text" name="fname" id="" placeholder="First Name" required>
            <input class="input" type="text" name="mname" id="" placeholder="Middle Name"> <br><br>
            <input class="input" type="text" name="lname" id="" placeholder="Last Name" required>
            <div>
                <label>Gender:</label>
                <input type="radio" name="gender" value="Male" checked>Male
                <input type="radio" name="gender" value="Female">Female
            </div><br><br>
            <label>Father Name: </label>
            <select name="fatherid">
                <option>select father ( DOB ) - NONE</option>
            <?php
            $db_handle = new DBController();
            $resultfather = $db_handle->rawQuery("SELECT * FROM person Where Gender='Male'");
            while ($rowfather = mysqli_fetch_assoc($resultfather)) {
                echo "<option value='".$rowfather['id']."'>".$rowfather['firstName'].' '.$rowfather['lastName'].'( '.$rowfather['DateOfBirth'].' )'."</option>";

            }
            ?>
            </select>
            <br><br>
            <label>Mother Name: </label>
            <select name="motherid">
                <option>select Mother ( DOB ) - NONE</option>
            <?php
            $db_handle = new DBController();
            $resultfather = $db_handle->rawQuery("SELECT * FROM person Where Gender='Female'");
            while ($rowfather = mysqli_fetch_assoc($resultfather)) {
                echo "<option value='".$rowfather['id']."'>".$rowfather['firstName'].' '.$rowfather['lastName'].'( '.$rowfather['DateOfBirth'].' )'."</option>";

            }
            ?>
            </select>
            <br><br>
            <p><b>Permanent Address *</b></p>
            <input type="text" class="input" placeholder="Enter permanent address" name="permanentaddress" >
            <p><b>Temporary Address *</b></p>
            <input type="text" class="input" placeholder="Enter Temporary address" name="Temporaryaddress" >
            <p><b>Occupation</b></p>
            <input type="text" class="input" placeholder="Enter Occupation" name="occupation" >
            <p><b>About (if any)</b></p>
            <textarea name="about" rows="4" cols="50" placeholder="enter some description"></textarea>

            <!-- <input class="input" type="number" name="fatherid" id="" placeholder="Father Id" onblur="checkUser(this.value,'popName')"> -->
            <p id="popName"></p>
            <!-- <input class="input" type="text" name="father" id="" placeholder="Father Name"> -->
            <!-- <input class="input" type="number" name="motherid" id="" placeholder="Mother Id" onblur="checkUser(this.value,'momName')"> -->
            <!-- <input class="input" type="text" name="mother" id="" placeholder="Mother Name"> -->
            <p id="momName"></p>
            <label>Date of Birth</label>
            <input class="input" type="date" name="DOB" id="" placeholder="Date of Birth" required><br>
            <label for="actCheck">Set Active</label>
            <input class="input " type="checkbox" name="activeStatus" id="actCheck"><br>
            <input class="input btn btn-primary" type="submit" value="Add" id="subBtn">
        </form>
    </div>      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<a href="add-people.php"><button type="button" class="btn btn-primary">
  Add People
</button> </a>
<a href="export.php"><button type="button" style="margin-right:0px;" class="btn btn-danger">
<i class='bx bx-download'></i>  Download All People Details in Excel Form
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
        <th>Father Name</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Pusta No.</th>
        <th>Is alive ?</th>
        <th>Reg_Date</th>
        <th class="text-center" colspan=3>Action</th>
    </tr>
    <?php
    $i=1;
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
<td><?php echo $i; ?></td>
<script>
    console.log('<?php echo $row['firstName'];?>');
</script>
<td><?php $name = $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];   echo $name; ?></td>
<td><?php
$fathername = $row['fatherfirstname'].' '.$row['fathermiddlename'].' '.$row['fatherlastname'];
 if($fathername!=null){echo $fathername;}else { echo "-";}   ?></td>

<td><?php echo $row['Gender']; ?></td>
<td><?php echo $row['DateOfBirth']; ?></td>
<td><?php echo $row['Pusta_Number']; ?></td>
<td><?php
    $status = $row['activeStatus'];
    if($status=="on")
    {
        echo "Yes";
    }
    else
    {
        echo "No";
    }
?></td>
<td><?php echo $row['RegDate']; ?></td>
<td><a href="people-profile.php?profileid=<?php echo $row['slug']; ?>">  <i class='bx bx-show'></i></a>
</td>
<td>
  <a href="update-profile.php?profileid=<?php echo $row['slug']; ?>">
  <button type="submit" name="edit" style="background:none;border:none;">
    <img src="images/edit-icon.png" alt="edit">
</button>
</a>
  </td>
<td>
  <?php $people = $row['firstName'].' '.$row['middleName'].' '.$row['lastName'].' ( '.$row['DateOfBirth'].' )'; ?>
<form action="" method="post" onsubmit="return confirmmsg('<?php echo $people; ?>')">
    <input type="hidden" name="peopleid" value="<?php echo $row['id']; ?>">
    <button type="submit" name="delete" style="background:none;border:none;"><img src="images/delete-16.ico" alt="delete"></button>
              </form>

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
    else {
        header('location:index.php');
    } ?>

