<?php 

$dir    = 'folder';
$files  = scandir($dir);

unset($files[0]);
unset($files[1]);

foreach ($files as $key => $chapter) {

	$chapter_name = substr($chapter, 14);

	if ($handle = opendir('folder/'.$chapter)) {

		$structure = 'converted/'.$chapter;
		mkdir($structure, 0777, true);

		$i = 1;

		while (false !== ($entry = readdir($handle))) {

			if (!is_dir($entry)) {

				$new_name = $chapter_name . "_Page" . $i . '.pdf';
				
				// Now rename the file
				rename( 'folder/' . $chapter . '/' . $entry, 'converted/' . $chapter . '/' . $new_name);
				// rename( 'folder/' . $chapter . '/' . $entry, 'folder/' . $chapter . '/' . $new_name);

				$i++;

			} 
	    }
	    closedir($handle);
	}
}

echo "Renaming Process Completed";