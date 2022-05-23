<?php
session_start();
include "dbcontroller.php";
$db_handle = new DBController();
extract($_POST);
$searchQuery = "SELECT * FROM superuser WHERE BINARY mail = BINARY '$userName' AND BINARY password = BINARY '$userPass'";
if ($db_handle->numRows($searchQuery) != 0) {
    $rtnData = $db_handle->runQuery($searchQuery);
    if ($rtnData[0]['activeStatus'] == 1) {
        print_r($rtnData);
        $_SESSION['id'] = $rtnData[0]['id'];
        $_SESSION['AdminCategory'] = $rtnData[0]['Category'];
        $_SESSION['user'] = $userName;
        $_SESSION['usersession']="admin";
        header("location:peoples.php");
    } else { ?>
        <script>
            alert('You are not Active Yet Contct Admin');
            window.location = 'index.php';
        </script>
    <?php }
} else { ?>
    <script>
        alert('Wrong Username or Password!');
        window.location = 'index.php';
    </script>
<?php }
