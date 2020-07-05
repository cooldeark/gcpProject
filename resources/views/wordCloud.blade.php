<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-tag-cloud.min.js"></script>
    <script src="https://cdn.anychart.com/releases/8.7.1/js/anychart-base.min.js" type="text/javascript"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        html, body, #test {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        }
      </style>
<div id="test"></div>
<script>
    anychart.onDocumentReady(function() {
    //文字雲資料來源
    var data = [
    {"x": "Mandarin chinese", "value": 1090000000},
    {"x": "English", "value": 983000000},
    {"x": "Hindustani", "value": 544000000},
    {"x": "Spanish", "value": 527000000},
    {"x": "Arabic", "value": 422000000},
    {"x": "Malay", "value": 281000000},
    {"x": "Russian", "value": 267000000},
    {"x": "Bengali", "value": 261000000},
    {"x": "Portuguese", "value": 229000000},
    {"x": "French", "value": 229000000},
    {"x": "Hausa", "value": 150000000},
    {"x": "Punjabi", "value": 148000000},
    {"x": "Japanese", "value": 129000000},
    {"x": "German", "value": 129000000},
    {"x": "Persian", "value": 121000000}
  ];
  
  // create a tag (word) cloud chart
  var chart = anychart.tagCloud(data);
// set a chart title
  chart.title('15 most spoken languages')
  // set an array of angles at which the words will be laid out
  chart.angles([0])
  // enable a color range bar,true will show
  chart.colorRange(false);
  // set the color range length
  chart.colorRange().length('80%');
// display the word cloud chart
  chart.container("test");
// format the tooltips ，如果數字太大可以直接把他format
var formatter = "{%value}{scale:(1)(1000)(1000)(1000)|( dozen)( thousand)( million)( billion)}";
var tooltip = chart.tooltip();
tooltip.format(formatter);
//把tooltips拿掉
chart.tooltip(false);
//讓你的字會不會旋轉
// chart.angles([0, -45, 90]);

  chart.draw();
});
</script>
</body>
</html>