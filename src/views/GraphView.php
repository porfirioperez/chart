<?php
namespace studs\hw4\views;

error_reporting(-1);
ini_set("display_errors", "on");

require_once("View.php");
require_once("./src/utilities/Utilities.php");

use studs\hw4\utilities as u;

class GraphView extends View {
  public function render($data) {
    // "XXXXX LineGraph - PasteChart"
    ?>
    <head>
      <meta charset="UTF-8">
      <title><?php echo $data['md5data'] . ' ' . $data['graphType'];?> - PasteChart</title>
    </head>
    <body>
    <h1><?php echo $data['md5data'] . ' ' . $data['graphType'];?> - PasteChart</h1>
    <div id="graph"></div>
    <script src="src/scripts/chart.js"></script>
    <script>
    graph = new Chart("graph",
    <?php echo u\chartDataToJson($data['data']); ?>
    , {"title":"<?php echo $data['title']; ?>"});
  graph.drawLineGraph();
    </script>
    </body>
<?php
  }
}
?>