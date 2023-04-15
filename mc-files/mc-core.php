<?php


require_once 'mc-tags.php';
require_once 'mc-conf.php';

function mc_404()
{
  header('HTTP/1.0 404 Not Found');
  echo "<h1>404 Not Found</h1>";
  echo "The page that you have requested could not be found.";
  exit();
}
?>
<?php
ini_set('memory_limit','256M');
$file = $_GET["file"];
if (file_exists($file)){
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header("Content-Type: application/force-download");
	header('Content-Disposition: attachment; filename=' . urlencode(basename($file)));
	header('Content-Transfer-Encoding: binary');
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file));
	ob_clean();
	flush();
	readfile($file);
	exit;
}
?>
