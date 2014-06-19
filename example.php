<?php
//
// Example script
//

session_start();
require "CSRF.class.php";

if (!empty($_POST)){
	
	echo '<pre>POST:', PHP_EOL, print_r($_POST, TRUE), '</pre>';
	
	if (!empty($_POST['submitform1'])) {
		if (CSRF::check($_POST['csrf_token'], 'form1')) {
			echo '<strong style="color:green">Form 1 OK.</strong>';
			// do something
			// ...
		} else {
			echo '<strong style="color:red">Form 1 KO!</strong>';
		}
	}
	if (!empty($_POST['submitform2'])) {
		if (CSRF::check($_POST['csrf_token'], 'form2')) {
			echo '<strong style="color:green">Form 2 OK.</strong>';
			// do something
			// ...
		} else {
			echo '<strong style="color:red">Form 2 KO!</strong>';
		}
	}
	if (!empty($_POST['submitform3'])) {
		if (CSRF::check($_POST['csrf_token'], 'form3')) {
			echo '<strong style="color:green">Form 3 OK.</strong>';
			// do something
			// ...
		} else {
			echo '<strong style="color:red">Form 3 KO!</strong>';
		}
	}
}
?>

<h2>Form 1: with token.</h2>
<form name="form1" action="" method="post">
    <input type="text" name="field" value="value">
	<input type="hidden" name="csrf_token" value="<?php echo CSRF::generate('form1'); ?>">
	
    <input type="submit" name="submitform1" value="submit">
</form>

<h2>Form 2: with token.</h2>
<form name="form2" action="" method="post">
    <input type="text" name="field" value="value">
	<input type="hidden" name="csrf_token" value="<?php echo CSRF::generate('form2'); ?>">
    <input type="submit" name="submitform2" value="submit">
</form>

<h2>Form 3: without or with wrong token.</h2>
<form name="form3" action="" method="post">
    <input type="text" name="field" value="value">
	<input type="hidden" name="csrf_token" value="foobar">
    <input type="submit" name="submitform3" value="submit">
</form>