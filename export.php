<?php
session_start();

if(isset($_SESSION['usersession']) && $_SESSION['usersession']=="admin")
{
    require "dbcontroller.php";
    $db_handle = new DBController();
    $result = $db_handle->rawQuery("SELECT * FROM peoplesdetail");
     $flag = false;
    $html = '<table border=1>';
    while ($row = mysqli_fetch_assoc($result)) {
         if (!$flag) {
             // display field/column names as first row
            $html.="<tr>";
            $html.= "<th>".implode("\t <th>", array_keys($row)) . "</th>\r\n";
            $html.="</tr>";
             // echo implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
         }
        $html.="<tr>";
        $html.= "<td>".implode("\t <td>", array_values($row)) . "</td>\r\n";
        // $html.= implode("<td>", array_values($row)) . "</td>";
        // echo implode("\t", array_values($row)) . "<br>";
        $html.="</tr>";
    }
    $html .= '</table>';

    header('Content-Type:application/xls');
    header('Content-Disposition:attachment;filename='. date("Y-m-dhisa").'peopledetail.xls');
    echo $html;

}

?>