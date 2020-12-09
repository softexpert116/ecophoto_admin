<?php

class Db_log {

    function __construct() {
    }

    function log_query() {

	$CI = & get_instance();

	$times = $CI->db->query_times;

	$message = '';

        foreach ($CI->db->queries as $key => $query) { 
	    $query = preg_replace('/\n/', ' ', $query);
	    //$message .= $key . ' => ' . $query . ' => ' . $times[$key] . "\n";
	    $message .= $query . "\n";
        }

	log_message('debug', $message);

    }

}


?>
