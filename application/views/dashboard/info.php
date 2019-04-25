
<!DOCTYPE html>
<html>
<head>
<title>File Not Found</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" >
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="<?php echo base_url('assets/jsbarcode');?>/JsBarcode.all.min.js"></script>
<style type="text/css">
body {
  background-color: #eee;
}

body, h1, p {
  font-family: "Helvetica Neue", "Segoe UI", Segoe, Helvetica, Arial, "Lucida Grande", sans-serif;
  font-weight: normal;
  margin: 0;
  padding: 0;
  text-align: center;
}

.container {
  margin-left:  auto;
  margin-right:  auto;
  margin-top: 177px;
  max-width: 1170px;
  padding-right: 15px;
  padding-left: 15px;
}

.row:before, .row:after {
  display: table;
  content: " ";
}

.col-md-6 {
  width: 50%;
}

.col-md-push-3 {
  margin-left: 25%;
}

h1 {
  font-size: 48px;
  font-weight: 300;
  margin: 0 0 20px 0;
}

.lead {
  font-size: 21px;
  font-weight: 200;
  margin-bottom: 20px;
}

p {
  margin: 0 0 10px;
}

a {
  color: #3282e6;
  text-decoration: none;
}
</style>
</head>

<body>
<div class="container text-center" id="error">
    <svg id="barcode" style="color: black"></svg>
 <div class="row">
    <div class="col-md-12">
      <div class="main-icon text-warning"><span class="uxicon uxicon-alert"></span></div>
        <h1><strong>code</strong>STORE</h1>
  
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-md-push-3">
      <!-- p class="lead">If you think what you're looking for should be here, please contact the site owner.</p -->
    </div>
  </div>
</div>
<script>
    //JsBarcode("#barcode", "codeSTORE");
    JsBarcode(".barcode").init();

var barcodeStrings = ["MiaSoftware Network", "codeSTORE System", "soporte@miasoftware.net"];
var barcodeStringsI = 0;

var start = null;

var state = "in";

nextBarcode();

function anim(timestamp){
  if(!start) start = timestamp;
  var progress = timestamp - start;
  var percentage = progress / 1000;
  if(percentage > 1) percentage = 1;

  if(state == "in") setRectsHeights(percentage);
  if(state == "out") setRectsHeights(1 - percentage );

  if(percentage < 1){
    window.requestAnimationFrame(anim);
  }
  else{
    start = null;

    if(state == "in"){
      state = "out";
      setTimeout(function(){
        window.requestAnimationFrame(anim);
      }, 4500);
    }

    else if(state == "out"){
      state = "in";
      nextBarcode();
      setRectsHeights(0);

      setTimeout(function(){
        window.requestAnimationFrame(anim);
      }, 300);
    }
  }
}

function setRectsHeights(percentage){
  var rects = document.querySelectorAll("#barcode rect");
  for (var i = 0, len = rects.length; i < len; i++) {
    var rectPart = (i / rects.length) ;
    var y =  Math.sin(rectPart * Math.PI)*2 + Math.easeInOutQuad(percentage)*3 - 2;
    if(y > 1) y = 1;
    if(y < 0) y = 0;

    rects[i].style.transform = "scale(1, " + y + ")";
  }
}

function nextBarcode(){
  JsBarcode("#barcode", barcodeStrings[barcodeStringsI++ % barcodeStrings.length], {
    displayValue: false,
    background: "rgba(0,0,0,0)",
    lineColor: "#181818",
    width: 2,
    height: 150
  });
}

window.requestAnimationFrame(anim);


Math.easeInOutQuad = function (t) {
	if (t <= 0.5) return t*t*2;
  t -= 0.5;
	return 2 * t * (1 - t) + 0.5;
};
</script>
</body>
</html>
