<?php 
session_start();

if(isset($_SESSION['usersession']) && $_SESSION['usersession']=="admin")
{
include 'include/dashboard-sidebar.php';

?>
<div class="home-content">

<ul>
    <!-- <li>active</li> -->
    <!-- <li>total</li> -->
    <li><a href="AddNew.php">add new</a></li>
    <!-- <li>edit</li> -->
    <!-- <li>family tree from <i>here</i> to <i>here</i></li> -->
    <li><a href="tree.php">family Tree</a></li>
</ul>  
 
    </div>
    <?php include 'include/dashboard-footer.php';
    }
    else {
        header('location:index.php');
    } ?>
