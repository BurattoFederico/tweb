<?php
include_once 'top.html';
?>

<p><strong>Matches for <?= $_GET['name']; ?></strong></p>

<?php 
# leggo il file
$linea = file('singles.txt',FILE_IGNORE_NEW_LINES);
foreach ($linea as $linea_tmp) {
	$token  = strtok($linea_tmp, ","); 
	if ($token == $_GET['name'])
		$token_v = $linea_tmp; 
}

list($user_name,$gender,$age,$pers_type,$favorite_OS,$min_age,$max_age) = explode(",", $token_v);

$compatible_users = array();
foreach ($linea as $ln) {
	list($user_name1,$gender1,$age1,$pers_type1,$favorite_OS1,$min_age1,$max_age1) = explode(",", $ln);
	# primo controllo di compatibilità
	if($user_name != $user_name1 and $age1 >= $min_age and $age1 <= $max_age and $gender != $gender1 and $favorite_OS == $favorite_OS1)
	{
        #secondo controllo di compatibilita , sul carattere  
		for( $i = 0; $i < 4 ; $i++ ) {
		    if(substr( $pers_type, $i, 1 ) == substr( $pers_type1, $i, 1 ))
		    {
		    	array_push($compatible_users, $ln); 
		    	break;
		    }
		}
	}
}

#Stampiamo gli utenti compatibili contenuti in $compatible_user

foreach ($compatible_users as $c_user) {
	list($user_name1,$gender1,$age1,$pers_type1,$favorite_OS1,$min_age1,$max_age1) = explode(",", $c_user);
	?>
	<div class="match">
		<p> 
			<?= $user_name1 ?>
			<img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/user.jpg" alt="profile_pic">
		</p>
		<ul>
			<li><strong>Gender: </strong><?= $gender1?></li>
			<li><strong>Age: </strong><?= $age1  ?></li>
			<li><strong>Type: </strong><?= $pers_type1 ?></li>
			<li><strong>OS: </strong><?= $favorite_OS1 ?></li>
		</ul>
	</div>
<?php
}

include_once 'bottom.html';
?>