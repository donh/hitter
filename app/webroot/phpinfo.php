<?php
/**
* @php file name:	app/webroot/phpinfo.php
* @description:		This php file receives webhook from Github and then performs git pull.
* @related issues:	
* @param:			void
* @return:			void
* @author:			Don Hsieh
* @since:			09/27/2013
* @last modified: 	09/27/2013
* @called by:		Github webhook
*/

// https://help.github.com/articles/post-receive-hooks

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
		var_dump($payload);
		$pusher = @$payload['pusher']['name'];
		$pushedRef = @$payload['ref'];
		$pushedBranch = str_replace('refs/heads/', '' ,$pushedRef);
		echo 'pusher = '.$pusher.'<br>';
		echo 'pwd = '.$pwd.'<br>';
		echo 'pwd = '.$pwd.'<br>';
	}

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

phpinfo();
?>