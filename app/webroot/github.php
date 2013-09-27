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
	
	$pusher = null;
	$pushedBranch = null;

	// determine if we need to perform a git pull based on the pushed branch and the name of the hosting server
	//$performPull = false;
	$performPull = true;
	if ($performPull) {
		$gitPullResult = `git pull`;
		$gitHardResetResult = `git reset --hard origin`;
		$gitBranchResult = `git branch`;
		// change permission for app/Console/cake
		`chmod +x ../Console/cake`;
		$bashExit = `exit`;
	
		$message = date(DATE_RFC822). "\n";
		$message .= "pushedBranch: $pushedBranch\n";
		$message .= "forcePerformPull: $forcePerformPull\n";
		$message .= "git pull result: $gitPullResult";
		$message .= "git hard reset: $gitHardResetResult";
		$message .= "Current branch on server: $gitBranchResult";
		if ($pusher) $message .= "Pusher: $pusher\n";
		if ($pushedBranch) $message .= "To Branch: $pushedBranch\n";
		$message .= "chmod +x ../Console/cake\n";
		$message .= "Bash Exit.";

		echo str_replace("\n",'<br />',$message);
	} else echo 'Prequisites not met. Pull not performed.';
?>