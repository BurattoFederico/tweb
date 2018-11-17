<?php
include_once 'top.html';
?>

<form action="matches-submit.php">
	<fieldset class="column">
		<legend>Returning User:</legend>
			<div class="input_line">
                <strong>Name</strong>
			<input type="text" name="name" size="16">
            </div>
			<input type="submit" value="View My Matches">
	</fieldset>
</form>

<?php
include_once 'bottom.html';
?>