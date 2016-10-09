<?php

		private function Save(){
			$target_dir = "./tempUploads";

			if (!file_exists($target_dir)) {
				//Create folder to save if not exists
    			mkdir($target_dir, 0777, true);
			}

			//Assuming File recieved from a POST

			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if file already exists
			if (file_exists($target_file)) {
			    unlink($target_file);
			}
			// Check if $uploadOk is set to 0 by an error
			 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			     ConsoleLog("File Saved in Disk!");
			} else {
			    ConsoleLog("File Save error!");
			}

		}

		private function Delete(){
			$target_file = "tempFile.txt";

			// Check if file already exists
			if (file_exists($target_file)) {
			    unlink($target_file);
			}

		}

?>