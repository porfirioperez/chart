<!DOCTYPE html>
<html lang="en">

<?php
  session_start();  // start/continue the session

  require_once "./src/controllers/IndexController.php";
  require_once "./src/controllers/ChartController.php";

  use studs\hw4\controllers as c;

  if (isset($_POST['data'])) {
    // user submits the chart data form
    if (isset($_POST['chart-title'])) {
        // sanitize user input and save the new chart data set
        $controller = new c\ChartController();
        $controller->create();
    } else {
      // retrieve story from story table based on story identifier for editing
      // echo "creating new story- wrong place";
    }
  } elseif (!isset($_REQUEST['c'])) {
  	// render landing page
    // call index controller
    // $ctrl = 'c\IndexController';
    // $indexController = new $ctrl();
    $indexController = new c\IndexController();
    $indexController->index();
  } elseif (isset($_REQUEST['arg1'])) {
  	$controller = new c\ChartController();
  	switch ($_REQUEST['arg1']) {
    case "LineGraph":
    case "PointGraph":
    case "Histogram":
        $controller->draw($_REQUEST['arg1'], $_REQUEST['arg2']);
        break;
    case "xml":
    case "json":
  		$controller->respond($_REQUEST['arg1'], $_REQUEST['arg2']);
  		break;
    case "jsonp":
        $controller->respond($_REQUEST['arg1'], $_REQUEST['arg2'], $_REQUEST['arg3']);
        break;
    default:
        echo "Incorrect query parameters";
}
  }
 
?>  

</html>