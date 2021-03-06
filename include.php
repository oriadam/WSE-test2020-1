<?php
ini_set('html_errors', false);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
global $db;
$db = new SQLite3('db.sqlite');


function jsonEn($array)
{
	return json_encode($array, JSON_UNESCAPED_UNICODE);
}
function jsonDe($string)
{
	return json_decode($string, true);
}

function array_to_csv_download($array, $filename = "export.csv", $delimiter=",") {
	header('Content-Type: application/csv');
	header('Content-Type: application/csv; charset=UTF-8');	
	header('Content-Disposition: attachment; filename="'.$filename.'";');
	$f = fopen('php://output', 'w');

	// header row
	$header = [];
	foreach ($array[0] as $column => $val) {
		$header[]=$column;
	}
	fputcsv($f, $header, $delimiter);

	// data
	foreach ($array as $line) {
		fputcsv($f, $line, $delimiter);
	}
}
