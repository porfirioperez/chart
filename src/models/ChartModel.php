<?php
namespace studs\hw4\models;
error_reporting(-1);
ini_set("display_errors", "on");

require_once("Model.php");
class ChartModel extends Model {

  

  public function save($inputs) {
    
    $mysqli = $this->connect();

    if (!($stmt = $mysqli->prepare('INSERT INTO Chart
        Values(?, ?, ?)'))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        return;
    }
    if (!$stmt->bind_param("sss", $inputs['md5data'], $inputs['title'], $inputs['data'])) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        return;
    }
    if (!$stmt->execute()) {
         echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $stmt->close();
    // var_dump($inputs);
    /* close connection */
    $mysqli->close();
  }

  // return the row as an associative array where md5data is $md5data
  public function getRow($md5data) {
    $mysqli = $this->connect();

    if (!($stmt = $mysqli->prepare('SELECT * FROM Chart WHERE md5data = ?'))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        return;
    }
    if (!$stmt->bind_param("s", $md5data)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        return;
    }
    if (!$stmt->execute()) {
         echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    if (!($result = $stmt->get_result())) {
        echo "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
        return;
    }

    $row = $result->fetch_assoc();
    // var_dump($row);

    $stmt->close();
    /* close connection */
    $mysqli->close();

    return $row;
  }

  
}

?>