<?php
	echo date(DATE_RFC822).'<br>';//exit;
	$me = `whoami`;
	echo 'whoami = '.$me.'<br>';
	$pwd = `pwd`;
	echo 'pwd = '.$pwd.'<br>';

	//the request payload from github
	if (array_key_exists('payload', $_REQUEST)) {
		$payload = array();
		if (isset($_REQUEST['payload'])) {
			$payload = json_decode(stripslashes($_REQUEST['payload']), true);
		}
		$pusher = @$payload['pusher']['name'];
		$pushedRef = @$payload['ref'];
		$pushedBranch = str_replace('refs/heads/','',$pushedRef);
	}

phpinfo();
?>