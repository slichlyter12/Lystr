<?php 
	
	function recursiveRemove($directory) {
		foreach(glob("{$directory}/*") as $file) {
			if (is_dir($file)) {
				recursiveRemove($file);
			} else {
				unlink($file);
			}
		}
		rmdir($directory);
	}

?>