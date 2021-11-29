<?php
$session = new Session();
$loggedIn = $session->checkLoginStatus();
?>

<ul>
	<li><a href="<?php echo URL_ROOT; ?>financials.php">Key Financials</a></li>
	<li><a href="<?php echo URL_ROOT; ?>sectors.php">SEC Records</a></li>
	<li><a href="<?php echo URL_ROOT; ?>ceos.php">CEO Information</a></li>
	<?php
	if ($loggedIn) { 
		echo '<li><a href="<?php echo URL_ROOT; ?>users.php">Users</a></li>';
	}?>
</ul>