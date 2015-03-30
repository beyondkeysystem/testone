<?php

	exec('whoami', $o);
	print_r($o);

	mail('andras@kende.com', 'test', 'test');

	$c = exec('cd /home/andras/sites/gourmetdev.com/public/ && /usr/bin/git pull', $out, $r);

	print_r($c);
	print_r($out);
	print_r($r);

	exec('/home/andras/github.sh');

	shell_exec('/home/andras/github.sh');

	system('cd /home/andras/sites/gourmetdev.com/public/ && /usr/bin/git pull');

	system('/home/andras/github.sh');



//	if ( $_POST['payload'] ) {
//	}

	echo 'end';

?>
