<?php
namespace studs\hw4\controllers;
error_reporting(-1);
ini_set("display_errors", "on");

require_once("./src/models/ChartModel.php");
require_once("./src/views/GraphView.php");
require_once("./src/views/JsonView.php");
// require_once("./src/models/GenreModel.php");
// require_once("./src/views/IndexView.php");
// require_once("./src/views/WriteView.php");
require_once("Controller.php");
use studs\hw4\models as m;
use studs\hw4\views as v;

class ChartController extends Controller {
  public function create() {
    $config = require("./src/configs/Config.php");
    // sanitize form input
    // $args = array(
    // 'chart-title'   => FILTER_SANITIZE_SPECIAL_CHARS,
    // 'data'   => FILTER_SANITIZE_SPECIAL_CHARS
    // );
    // $myinputs = filter_input_array(INPUT_POST, $args);
    $myinputs = $_POST;
    if ($myinputs && $this->checkMaxLen($myinputs)) {
        //ok
        $md5data = hash('md5', $myinputs['data']);
        $chart = new m\ChartModel();
        $chart->save(array(
            'md5data' => $md5data,
    'title'   => $myinputs['chart-title'],
    'data'   => $myinputs['data']
    ));

        // POST-REDIRECT-GET design pattern'
                header("Location:" . $config['BASE_URL'] .
                    '?c=chart&a=show&arg1=LineGraph&arg2=' . $md5data);
    }
  }

  public function draw($graphType, $md5data) {
    $chartModel = new m\ChartModel();
    $chart = $chartModel->getRow($md5data);
    $chart['graphType'] = $graphType;
    $view = new v\GraphView();
   
    $view->render($chart);
  }

  public function respond($responseType, $md5data, $callbackfunc = null) {
    $chartModel = new m\ChartModel();
    $chart = $chartModel->getRow($md5data);
    $chart['responseType'] = $responseType;
    $chart['callbackFunc'] = $callbackFunc;
    switch ($responseType) {
    case "json":
    case "jsonp":
        $view = new v\JsonView();
        $view->render($chart);
        break;
    case "xml":
        // $view = new v\XmlView();
        // $view->render($chart);

    }
  }


  // validate the lengths of chart title and data
  private function checkMaxLen($inputs) {
    $result = true;
    $config = require("./src/configs/Config.php");

    if (strlen($inputs['chart-title']) > $config['MAX_TITLE']) {
        echo "Chart title must be no longer than " . $config['MAX_TITLE'] . "<br>";
        $result = false;
    }
    
    if (strlen($inputs['data']) > $config['MAX_DATA']) {
        echo "Chart data must be no longer than " . $config['MAX_CONTENT'] . "<br>";
        $result = false;
    }
    return $result;
  }
}
?>