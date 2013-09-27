<?php
	echo date(DATE_RFC822).'<br>';//exit;
	$me = `whoami`;
	echo 'whoami = '.$me.'<br>';
	$pwd = `pwd`;
	echo 'pwd = '.$pwd.'<br>';
phpinfo();
?>