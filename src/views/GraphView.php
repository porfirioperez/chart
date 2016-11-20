<?php
namespace studs\hw4\views;

error_reporting(-1);
ini_set("display_errors", "on");

require_once("View.php");

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
    {"Jan":[7, 5], "Feb":[20, 16], "Dec":[5, 8]}, {"title":"Test Chart - Month v Value"});
  graph.draw();
    </script>
    </body>
<?php
  }
}
?>