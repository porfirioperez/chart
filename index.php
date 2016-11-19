<!DOCTYPE html>
<html lang="en">

<?php
  session_start();  // start/continue the session

  require_once "./src/controllers/IndexController.php";

  use studs\hw4\controllers as c;

  if (!isset($_REQUEST['c'])) {
  	// render landing page
    // call index controller
    // $ctrl = 'c\IndexController';
    // $indexController = new $ctrl();
    $indexController = new c\IndexController();
    $indexController->index();
  }
 
?>  

</html>