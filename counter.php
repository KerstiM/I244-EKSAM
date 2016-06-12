<?php
	$file = 'count.txt';
	// ava fail, et saada olemasoevaid andmeid
	$current = file_get_contents($file);
	$current = $current + 1;
	// kirjuta andmed tagasi faili
	file_put_contents($file, $current);
	
	echo "See leht on sanaud nii palju laike: " . $current;
?>