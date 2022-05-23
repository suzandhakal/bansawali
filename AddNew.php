<?php
?>
<style>
    .formCont {
        width: 30%;
        margin: auto;
    }

    .formCont .input {
        text-align: center;
        display: block;
        width: 100%;
        margin-bottom: 3vh;
        height: 40px;
        border-radius: 7px;
    }

    #actCheck {
        height: auto;
        width: auto;
        display: inline-block;
    }

    #subBtn {
        width: 50%;
        margin: auto;
        padding: 0;
        border: none;
    }
</style>

<body>
    <div class="formCont">
        <form action="AddMember.php" method="post" name="entry">
            <input class="input" type="text" name="fname" id="" placeholder="First Name">
            <input class="input" type="text" name="mname" id="" placeholder="Middle Name">
            <input class="input" type="text" name="lname" id="" placeholder="Last Name">
            <div>
                <label>Gender:</label>
                <input type="radio" name="gender" value="Male" checked>Male
                <input type="radio" name="gender" value="Female">Female
            </div><br><br>
            <input class="input" type="number" name="fatherid" id="" placeholder="Father Id" onblur="checkUser(this.value,'popName')">
            <p id="popName"></p>
            <!-- <input class="input" type="text" name="father" id="" placeholder="Father Name"> -->
            <input class="input" type="number" name="motherid" id="" placeholder="Mother Id" onblur="checkUser(this.value,'momName')">
            <!-- <input class="input" type="text" name="mother" id="" placeholder="Mother Name"> -->
            <p id="momName"></p>
            <input class="input" type="date" name="DOB" id="" placeholder="Date of Birth" >
            <label for="actCheck">Set Active</label>
            <input class="input" type="checkbox" name="activeStatus" id="actCheck">
            <input class="input" type="submit" value="Add" id="subBtn">
        </form>
    </div>
</body>
<script>
    function checkUser(id, eleId) {
        var xhttp = new XMLHttpRequest();
        // console.log(eleId);
        // var txt = document.entry.motherid.value;
        xhttp.open("GET", "crossCheck.php?id="+id, true);
        xhttp.onreadystatechange = function() {
            if ((this.status == 200) && (this.readyState == 4)) {
                document.getElementById(eleId).innerHTML = this.responseText;
            }
        }
        xhttp.send();
    }
</script>



<!-- SELECT * FROM `person` JOIN `relationtable` ON `person`.`id` = `relationtable`.`u1id` OR `person`.`id` =  `relationtable`.`u2id` -->