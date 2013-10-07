<?php
	/**
	* @php file name:	app/webroot/github.php
	* @description:		This php file perform "pull" on receiving Github Webhook.
	* @related issues:	QH-008
	* @param:			void
	* @return:			void
	* @author:			Don Hsieh
	* @since:			10/07/2013
	* @last modified: 	10/07/2013
	* @called by:		Github Webhook
	*/
	echo date(DATE_RFC822).'<br>';//exit;
	$me = `whoami`;
	echo 'whoami = '.$me.'<br>';
	$pwd = `pwd`;
	echo 'pwd = '.$pwd.'<br>';

	//the request payload from github
	if (array_key_exists('payload', $_REQUEST)) {
		$now = gmdate('Y-m-d H:i:s', strtotime('now') + 8*3600)."\n";
		$github_log = '/var/www/dev/app/tmp/logs/github.log';
		error_log($now, 3, $github_log);
		$payload = array();
		if (isset($_REQUEST['payload'])) {
			$payload = json_decode($_REQUEST['payload'], true);
		}
		error_log('$payload = '.print_r($payload, true), 3, $github_log);

		$title = @$payload['commits'][0]['message'];
		$SHA = @$payload['commits'][0]['id'];
		$pusher = @$payload['pusher']['name'];
		$pushedRef = @$payload['ref'];
		//$pushedBranch = str_replace('refs/heads/', '', $pushedRef);
		$pushedBranch = @$payload['repository']['master_branch'];
		error_log('$title = '.$title."\n", 3, $github_log);
		error_log('$SHA = '.$SHA."\n", 3, $github_log);
		error_log('$pusher = '.$pusher."\n", 3, $github_log);
		error_log('$pushedRef = '.$pushedRef."\n", 3, $github_log);
		error_log('$pushedBranch = '.$pushedBranch."\n", 3, $github_log);
	}
	$serverName = strtolower($_SERVER["SERVER_NAME"]);
	$serverSubdomain = str_replace('.worthii.com', '', $serverName);
	error_log('$serverName = '.$serverName."\n", 3, $github_log);
	echo 'serverName = '.$serverName.'<br>';

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
	
		//$message = date(DATE_RFC822). "\n";
		$message = $now."\n";
		$message .= "Script called from: {$_SERVER['REMOTE_ADDR']}\n";
		$message .= "serverName: $serverName\n";
		$message .= "pushedBranch: $pushedBranch\n";
		$message .= "serverSubdomain: $serverSubdomain\n";
		if (isset($title)) $message .= "title: $title\n";
		if (isset($SHA)) $message .= "SHA: $SHA\n";
		$message .= "forcePerformPull: $forcePerformPull\n";
		$message .= "git pull result: $gitPullResult";
		$message .= "git hard reset: $gitHardResetResult";
		$message .= "Current branch on server: $gitBranchResult";
		if ($pusher) $message .= "Pusher: $pusher\n";
		if ($pushedBranch) $message .= "To Branch: $pushedBranch\n";
		$message .= "chmod +x ../Console/cake\n";
		$message .= "Bash Exit.";
		error_log($message."\n", 3, $github_log);
		echo str_replace("\n", '<br />', $message);
	} else {
		error_log('Prequisites not met. Pull not performed.'."\n", 3, $github_log);
		echo 'Prequisites not met. Pull not performed.';
	}
?>