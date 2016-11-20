<?php
namespace studs\hw4\views;

error_reporting(-1);
ini_set("display_errors", "on");

require_once("./src/utilities/Utilities.php");

use studs\hw4\utilities as u;

class JsonView extends View {
  public function render($data) {
    // "XXXXX json or jsonp - PasteChart"
    $jsonString = u\chartDataToJson($data['data']);
    ?>
    <head>
      <meta charset="UTF-8">
      <title><?php echo $data['md5data'] . ' ' . $data['responseType'];?> - PasteChart</title>
    </head>
    <body>
    <h1><?php echo $data['md5data'] . ' ' . $data['responseType'];?> - PasteChart</h1>

    <div><?php echo $jsonString; ?></div>
    
    </body>
<?php
  }
}
?>