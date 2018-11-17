<?php include("top.html"); ?>

<!--  pagina per la raccolta dati personali del sito nerdLuv

	Buratto Federico
-->
<form action="signup-submit.php" method="post">
	<fieldset class="column">
		<legend>New User Signup</legend>		
		<div class="input_line">
			<strong>Name</strong>
			<input type="text" name="name" size="16"><br>
		</div>		
		<div class="input_line">
            <strong>Gender</strong>
				<input type="radio" name="gender" value="M" />Male
				<input type="radio" name="gender" value="F" checked="checked" />Female
			<br>
		</div>	
		<div class="input_line">
			<strong>Age</strong>
			<input type="text" name="text" pattern="([1-9][0-9])" maxlength="2" size="6">
			<br>
		</div>		
		<div class="input_line">
			<strong>Personality type</strong>
			<input type="text" name="personality" maxlength="4" size="6">
			<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp" target="_blank">Don't know your type?</a>
			<br>
		</div>
		<div class="input_line">
			<strong>Favourite OS</strong>
			<select name="favoriteOS">  
				<option selected="selected">Linux</option>
				<option>Mac OS X</option> 
				<option>Windows</option>  
			</select>
			<br>
		</div>
		<div class="input_line">
			<strong>Seeking age</strong>
			<input type="text" name="seekingage_sx" placeholder="min" maxlength="2" size="6">
			to
			<input type="text" name="seekingage_dx"  placeholder="max" maxlength="2" size="6">
			<br>
		</div>
		<input type="submit" value="Sign up">
	</fieldset>
</form>

<?php include("bottom.html"); ?>