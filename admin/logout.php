<?php
session_start();
$_SESSION['alogin']=="";
session_unset();

$_SESSION['errmsg']="You have successfully logout";
<p style="color: green;"><?php echo $message; ?></p>

?>
<script language="javascript">
document.location="index.php";
</script>
