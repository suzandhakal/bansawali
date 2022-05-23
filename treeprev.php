<?php 
session_start();

if(isset($_SESSION['usersession']) && $_SESSION['usersession']=="admin")
{
	require "dbcontroller.php";
	include 'include/dashboard-sidebar.php';
	$db_handle = new DBController();
	$result = $db_handle->rawQuery("SELECT *,`person`.`id` AS pid FROM `person`LEFT JOIN `parent` ON `person`.`id` = `parent`.`chid`/* WHERE `person`.`id`  = 10*/");
	$arr = [];
	// function
	while ($row = mysqli_fetch_assoc($result)) {
		$arr[$row['pid']]['firstName'] = $row['firstName'];
		$arr[$row['pid']]['midName'] = $row['middleName'];
		$arr[$row['pid']]['lastName'] = $row['lastName'];
		$arr[$row['pid']]['prid'] = $row['prid'];
	}
	
	function buildTreeView($arr, $parent, $level = 0, $prelevel = -1){
		foreach ($arr as $id => $data) {
			if ($parent == $data['prid']) {
				if ($level > $prelevel) {
					echo "<ol>";
				}
				if ($level == $prelevel) {
					echo "</li>";
				}
				echo "<li>" . $data['firstName'];
				if ($level > $prelevel) {
					$prelevel = $level;
				}
				$level++;
				buildTreeView($arr, $id, $level, $prelevel);
				$level--;
			}
	
		}
		if ($level == $prelevel) {
			echo "</li></ol>";
		}
	}
	
	?>
	<style>
		/*Now the CSS*/
	* {margin: 0; padding: 0;}
	
	.tree {
		width: 100% !important;
	}
	.tree ol {
		padding-top: 20px; position: relative;
		
		transition: all 0.5s;
		-webkit-transition: all 0.5s;
		-moz-transition: all 0.5s;
	}
	
	.tree li {
		float: left; text-align: center;
		list-style-type: none;
		position: relative;
		padding: 20px 5px 0 5px;
		
		transition: all 0.5s;
		-webkit-transition: all 0.5s;
		-moz-transition: all 0.5s;
	}
	
	/*We will use ::before and ::after to draw the connectors*/
	
	.tree li::before, .tree li::after{
		content: '';
		position: absolute; top: 0; right: 50%;
		border-top: 1px solid #ccc;
		width: 50%; height: 20px;
	}
	.tree li::after{
		right: auto; left: 50%;
		border-left: 1px solid #ccc;
	}
	
	/*We need to remove left-right connectors from elements without 
	any siblings*/
	.tree li:only-child::after, .tree li:only-child::before {
		display: none;
	}
	
	/*Remove space from the top of single children*/
	.tree li:only-child{ padding-top: 0;}
	
	/*Remove left connector from first child and 
	right connector from last child*/
	.tree li:first-child::before, .tree li:last-child::after{
		border: 0 none;
	}
	/*Adding back the vertical connector to the last nodes*/
	.tree li:last-child::before{
		border-right: 1px solid #ccc;
		border-radius: 0 5px 0 0;
		-webkit-border-radius: 0 5px 0 0;
		-moz-border-radius: 0 5px 0 0;
	}
	.tree li:first-child::after{
		border-radius: 5px 0 0 0;
		-webkit-border-radius: 5px 0 0 0;
		-moz-border-radius: 5px 0 0 0;
	}
	
	/*Time to add downward connectors from parents*/
	.tree ol ol::before{
		content: '';
		position: absolute; top: 0; left: 50%;
		border-left: 1px solid #ccc;
		width: 0; height: 20px;
	}
	
	.tree li a{
		border: 1px solid #ccc;
		padding: 5px 10px;
		text-decoration: none;
		color: #666;
		font-family: arial, verdana, tahoma;
		font-size: 11px;
		display: inline-block;
		
		border-radius: 5px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		
		transition: all 0.5s;
		-webkit-transition: all 0.5s;
		-moz-transition: all 0.5s;
	}
	
	/*Time for some hover effects*/
	/*We will apply the hover effect the the lineage of the element also*/
	.tree li a:hover, .tree li a:hover+ol li a {
		background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
	}
	/*Connector styles on hover*/
	.tree li a:hover+ol li::after, 
	.tree li a:hover+ol li::before, 
	.tree li a:hover+ol::before, 
	.tree li a:hover+ol ol::before{
		border-color:  #94a0b4;
	}
	</style>
	<h1>Parent View</h1>
	<div class='tree'>
		<?php
	buildTreeView($arr, null);
	echo"</div>";
    include 'include/dashboard-footer.php';
    }
    else {
        header('location:index.php');
    } 
	?>


