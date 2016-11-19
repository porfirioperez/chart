<?php

namespace studs\hw4\controllers;
error_reporting(-1);
ini_set("display_errors", "on");

// require_once("./src/models/StoryModel.php");
// require_once("./src/models/GenreModel.php");
require_once("./src/views/IndexView.php");
require_once("Controller.php");
//se studs\hw3\models as m;
use studs\hw4\views as v;

class IndexController extends Controller {
  public function index() {
    $view = new v\IndexView();
    $view->render(null);
  }
}
?>