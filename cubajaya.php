<?php

//Database initialization
 include "config.php";



if(isset($_POST["loadbtn"]))
{
    $id = (integer) $_POST["codes"];

    $query = "SELECT stockName FROM stock WHERE Sid = '$id ";
    $result = mysql_query($query, $conn);
    $details = mysql_fetch_array($result);

    $stockName = $details["stockName"];
    
}

?>

<html>
<head>
</head>
<body>

<div id="upserv">
<b id="caption2">Update location</b>
<br/><br/>
    <form name="upServForm" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" >
        <?php
        $dropdown = "<select name='codes'>";
        while($row = mysql_fetch_array($result)) 
        {
            $dropdown .= "\r\n<option value='{$row['id']}'>{$row['id']}</option>";
        }
        $dropdown .= "\r\n</select>";
    ?>
     Service ID  <?php echo $dropdown; ?> <input type="submit" value="Load" name="loadbtn">
        <table width="300" border="0">
          <tr>
            <td>Name</td>
            <td><input type="text" name="upName" style="text-align:right" value="<? echo $savedName; ?>" /></td>
          </tr>
          <tr>
            <td>Cost</td>
            <td><input type="text" name="upCost" style="text-align:right" value="<? echo $savedCost; ?>" /></td>
          </tr>
          <tr>
            <td>Active</td>
            <td><input type="checkbox" name="upActive" value="<? echo $savedActive; ?>" /></td>
          </tr>
        </table>
</div>
<br/>
<div id="buttons">
    <input type="reset" value="Clear" /> <input type="submit" value="Save" name="updatebtn" />
</div>
    </form>

</body>
</html>