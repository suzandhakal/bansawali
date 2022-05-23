<?php 
session_start();

if(isset($_SESSION['usersession']) && $_SESSION['usersession']=="admin")
{ 
    require "dbcontroller.php";
    $db_handle = new DBController();
    $msg ="";

include 'include/dashboard-sidebar.php';
$result1 = $db_handle->rawQuery("SELECT * FROM superuser");

?>
<script>
  function changeQuery()
  {
    var gender = document.getElementById('gender').value;
    var pustano = document.getElementById('pusta_no').value;
    var addedBy = document.getElementById('addedBy').value;
    getDataAsQuery(gender,pustano,addedBy)
  }

  function getDataAsQuery(gender,pustano,addedBy)
  {
    
    $.ajax({
 type: 'post',
 url: 'fetchdata.php',
 data: {
  gender:gender,
  pustano:pustano,
  addedBy:addedBy
 },
 success: function (response) {
   document.getElementById('tablecontent').innerHTML=response;
 } 
 
 });
  }
  </script>
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
.filter_div{
    margin-left:20px;
}
</style>
<div class="home-content">
<div><?php echo $msg; ?></div>

<h3>Filters</h3>

<div>
<span class="filter_div"> Gender 
    <select name="gender" id="gender" onchange="changeQuery()">
    <option value="">All</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>

    </select>
</span>
<span class="filter_div"> PustaNo 
    <select name="pustano" id="pusta_no" onchange="changeQuery()">
        <option value="">All</option>
        <?php
        $result = $db_handle->rawQuery("SELECT DISTINCT Pusta_Number FROM person");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value=".$row['Pusta_Number'].">".$row['Pusta_Number']."</option>";
        }
        ?>
    </select>
</span>
<span class="filter_div"> Added By 
    <select name="addedBy" id="addedBy" onchange="changeQuery()">
        <option value="">All</option>
        <?php
        $result = $db_handle->rawQuery("SELECT * FROM superuser");
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['firstName'].' '.$row['middleName'].' '.$row['lastName'];
            echo "<option value=".$row['id'].">".$name."</option>";
        }
        ?>

    </select>
</span>

</div>
 

<div id="tablecontent">
      </div>


    
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
changeQuery();
</script>

    <?php include 'include/dashboard-footer.php';
    }
    else {
        header('location:index.php');
    } ?>

