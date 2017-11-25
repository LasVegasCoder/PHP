<?php
/**
	"2017-06-15 19:15:20",127.0.0.1,/api/oauth/index.php?test=1&pown=true,"REQUEST :"
	"2017-06-16 00:30:53",127.0.0.1,/api/oauth/index.php?test=1&pown=true,"REQUEST :"
	"2017-06-16 00:30:53",127.0.0.1,/api/oauth/index.php?test=1&pown=true,"REQUEST :"	
	
	@Author: Prince Adeyemi
*/
 
function write_log($message, $logfile='') {
  //Check & start the session if not started
  if(session_id()==''){
		session_start();
	}
  // Determine log file
  if($logfile == '') {
    // Filename of log to use when none is given to write_log
    if( !defined( 'DEFAULT_LOG' ) ){
		define( 'DEFAULT_LOG', dirname(__FILE__).'/default.txt' );
    }

    if ($logfile != '' ){
      $logpath = realpath(dirname(__FILE__)) . $logfile;
      $logfile = $logpath;
    }
    // checking if the constant for the log file is defined
    if (defined(DEFAULT_LOG) == TRUE) {
        $logfile = DEFAULT_LOG;
    }
    // the constant is not defined and there is no log file given as input
    else {
        error_log('No log file defined!', 0);
        return array('status' => false, 'message' => 'No log file defined!');
    }
  }
 
  // Get time of request
  if( ($time = $_SERVER['REQUEST_TIME']) == '' ) {
    $time = time();
  }
 
  // Get IP address
  if( ($remote_addr = $_SERVER['REMOTE_ADDR'] ) == '') {
    $remote_addr = "REMOTE_ADDR_UNKNOWN";
  }
 
  // Get requested script
  if( ($request_uri = $_SERVER['REQUEST_URI'] ) == '') {
    $request_uri = "REQUEST_URI_UNKNOWN";
  }
 
  // Format the date and time
  $date = date("Y-m-d H:i:s", $time);
 
  // Append to the log file
  if($fd = @fopen($logfile, "a")) {
    //$result = fputcsv($fd, array("Date: ".$date, "IP Address : " .$remote_addr, "Link : " . $request_uri, "Msg : " .$message));
    $result = fputcsv($fd, array($date, $remote_addr, $request_uri, $message));
    fclose($fd);
 
    if($result > 0)
      return array('status' => true);  
    else
      return array('status' => false, 'message' => 'Unable to write to '.$logfile.'!');
  }
  else {
    return array('status' => false, 'message' => 'Unable to open log '.$logfile.'!');
  }
}

?>


<?php

$log 	= $_SERVER['REMOTE_ADDR'];
	if(empty($log ) || ( $log =='' )){
	return;
}

$msg	= 'REQUEST :';
write_log($msg, 'default.txt');

?>
