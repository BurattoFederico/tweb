<?php
include_once 'top.html';
?>

<p><strong>Thank you!</strong></p>
<p>Welcome to NerdLuv, <?= $_POST["name"]; ?>!</p>
<p>Now <a href="matches.php">log in to see your matches!</a></p>

<?php
# Costruisco la stringa da inserire in "singles.txt"
foreach($_POST as $data) {
	$final_string .= "$data,";
}
$line = substr($final_string,0, -1); # Cancella "," alla fine della riga 
$line .= "\n"; # Aggiunge \n a fine riga facendo si che il prossimo dato venga scritto a capo 

# Iserisco la stringa nel file
file_put_contents('singles.txt', $line, FILE_APPEND);

include_once'bottom.html';
?>