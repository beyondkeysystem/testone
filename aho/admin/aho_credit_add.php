<?php
require_once('includes/Database.php');


if (isset($_POST['id'])) {
    $query = "UPDATE AHO_User
        SET
            credits = '{$_POST['credits']}'
        WHERE id = {$_POST['agent']}";
    $db->update($query);

    echo "<div style=\"width: 100%; text-align: center; color: red\">Credits updated successfully.</div>";
}

$result = $db->select("SELECT * FROM AHO_User WHERE B_Code > 1 ORDER BY Name");

?>
<center>
<h1>Modify Agent Credits</h1>
<form id="form1" name="form1" method="post" action="">
  <label for="credits"></label>
  <label for="agents"></label>
  <select name="agent" id="agent">
<?php
// REPEAT THIS TR
foreach ($result as $row)
{
?>
<option  value="<?php echo $row['id'];?>" ><?php echo $row['Name'];?> - <?php echo $row['Email_1'];?> | Code: <?php echo $row['B_Code'];?> | Credits = <?php echo $row['credits'];?></option>

<? }?>
  </select>
  <input type="text" name="credits" id="credits" />
	<input type="hidden" name="id" value="submitting" />
  <input type="submit" name="update" id="update" value="update credits" />
</form>

</center>