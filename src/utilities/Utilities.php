<?php
namespace studs\hw4\utilities;

error_reporting(-1);
ini_set("display_errors", "on");

// input: "Jan,120,156,345\nFeb,210,233,90"
// output: '{"Jan":[120, 156,345], "Feb":[210, 233, 90]}'
function chartDataToJson($data) {
	$dataArray = explode("\n", $data); // ["Jan,120,156,345", "Feb,210,233,90"]

	$jsonObj  = array();

	foreach ($dataArray as $value) {
		$valueArray = preg_split("/\s*,\s*/", $value); // ["Jan", "120", ..]
		$label = array_shift($valueArray);
		$numberArray = [];
		foreach ($valueArray as $numStr) {
			array_push($numberArray, floatval($numStr));
		}
		$jsonObj[$label] = $numberArray;
	}
	return json_encode($jsonObj, JSON_PRETTY_PRINT);
}

?>