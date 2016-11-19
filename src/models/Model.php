<?php
namespace studs\hw4\models;

class Model {
  // public $mysqli;

  public function connect() {
    $config = require("./src/configs/Config.php");
    // if (!$mysqli)
    $mysqli = new \mysqli($config['host'], $config['username'], $config['password'],
      $config["database"]);
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    return $mysqli;
  }
}
?>