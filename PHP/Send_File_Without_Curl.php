<?php

		private function UploadWithoutCurl(){

			//Using $FILES since got this file from a POST data

			$optional_headers = array('Content-Type: multipart/form-data','Application: service-console-uploader');
			$params = array('http' => array(
			                'method' => 'POST',
			                'content' => file($_FILES['file']['tmp_name'])));
			 
			if ($optional_headers !== null) {
			    $params['http']['header'] = $optional_headers;
			}

			$url = "http://something.com/something".$_FILES['file']['name'];

			$ctx = stream_context_create($params);
			$fp = @fopen($url, 'rb', false, $ctx);

			if (!$fp) { 
      		ConsoleLog("Oh No!");   
  			} 

		   $response = @stream_get_contents($fp); 
		   if ($response === false) { 
		    ConsoleLog("Nay :( "); 
		   }else{
		   	ConsoleLog("Yay! :D ");
		   }
		}

?>