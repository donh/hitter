<?php
	echo date(DATE_RFC822).'<br>';//exit;
///*
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
		$pushedBranch = str_replace('refs/heads/', '', $pushedRef);
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

		echo str_replace("\n", '<br />', $message);
	} else echo 'Prequisites not met. Pull not performed.';
	//*/

/**
 * Logging class:
 * - contains lfile, lwrite and lclose public methods
 * - lfile sets path and name of log file
 * - lwrite writes message to the log file (and implicitly opens log file)
 * - lclose closes log file
 * - first call of lwrite method will open log file implicitly
 * - message is written with the following format: [d/M/Y:H:i:s] (script name) message
 */
/**
* @class name:		class Logging
* @description:		This class builds Shopzilla products information in 'us_reference_products',
*					 'us_shopzilla_atoms', 'us_shopzilla_merchants', 'us_shopzilla_offers',
*					 and 'us_title_feature_md5s' tables.
* @related issues:	WW-405
* @related issues:	WW-772
* @param:			void
* @return:			void
* @author:			Don Hsieh
* @since:			01/22/2013
* @last modified: 	10/03/2013
* @called by:		
*/
class Logging {
	// declare log file and file pointer as private properties
	private $log_file, $fp;
	// set log file (path and name)
	public function lfile($path) {
		$this->log_file = $path;
	}
	// write message to the log file
	public function lwrite($message) {
		// if file pointer doesn't exist, then open log file
		if (!is_resource($this->fp)) {
			$this->lopen();
		}
		// define script name
		$script_name = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);
		// define current time and suppress E_WARNING if using the system TZ settings
		// (don't forget to set the INI setting date.timezone)
		//$time = @date('[d/M/Y:H:i:s]');
		$time = '['.gmdate('Y-m-d H:i:s', strtotime('now') + 8*3600).']';
		// write current time, script name and message to the log file
		fwrite($this->fp, "$time ($script_name) $message" . PHP_EOL);
	}
	// close log file (it's always a good idea to close a file when you're done with it)
	public function lclose() {
		fclose($this->fp);
	}
	// open log file (private method)
	private function lopen() {
		$log_file_default = TMP.'logs'.DS.'github.log';
		
		// define log file from lfile method or use previously set default
		$lfile = $this->log_file ? $this->log_file : $log_file_default;
		// open log file for writing only and place file pointer at the end of the file
		// (if the file does not exist, try to create it)
		$this->fp = fopen($lfile, 'a') or exit("Can't open $lfile!");
	}
}
?>