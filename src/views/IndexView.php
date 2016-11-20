<?php
namespace studs\hw4\views;

error_reporting(-1);
ini_set("display_errors", "on");

require_once("View.php");

class IndexView extends View {
  public function render($data) {
    ?>
    <head>
      <meta charset="UTF-8">
      <title>PasteChart</title>
    </head>
    <body>
    <h1>PasteChart</h1>
    <p>Share your data in charts!</p>
    <form method="post" action="index.php">
        <label for="chart-title">Chart Title </label>
        <input type="text" id="chart-title" name="chart-title"></input><br><br>
        <textarea name="data" placeholder="textlabel,value,value,....." rows="50" cols="80" required></textarea><br><br>
        <button type="submit">Share</button>
    </form>

    </body>
<?php
  }
}
?>