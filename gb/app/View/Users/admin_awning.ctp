<?php
if(!empty($user['User']['awning_hslv'])) {
	$hslv = explode(',', $user['User']['awning_hslv']);
} else {
	$hslv = array(0,0,0,0);
}
?>

<style>

#awning1 {
	position: relative;
}

#div1 {
	position: absolute;
	top:-45px;
	left:177px;
	height: 63px;
	width: 206px;
	margin: 50px;
	padding:0px;
	perspective:100;
	-webkit-perspective:100; /* Safari and Chrome */
})

#div2 {
	padding:0px;
	background-color: red;
	transform: rotateX(45deg);
	-webkit-transform: rotateX(45deg); /* Safari and Chrome */
}

/** Sample Colors for Color Tool **/

.btn.a {
	background-color: hsl(193, 32%, 49%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(193, 32%, 79%)), to(hsl(193, 32%, 49%)));
	background-image: -moz-linear-gradient(top, hsl(193, 32%, 79%), hsl(193, 32%, 49%));
	background-image: -ms-linear-gradient(top, hsl(193, 32%, 79%), hsl(193, 32%, 49%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(193, 32%, 79%)), color-stop(100%, hsl(193, 32%, 49%)));
	background-image: -webkit-linear-gradient(top, hsl(193, 32%, 79%), hsl(193, 32%, 49%));
	background-image: -o-linear-gradient(top, hsl(193, 32%, 79%), hsl(193, 32%, 49%));
	background-image: linear-gradient(hsl(193, 32%, 79%), hsl(193, 32%, 49%));
	border-color: hsl(193, 32%, 49%) hsl(193, 32%, 49%) hsl(193, 32%, 41.5%);
	color: #333;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.49);
	-webkit-font-smoothing: antialiased;
}


.btn.b {
	background-color: hsl(36, 100%, 40%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(36, 100%, 60%)), to(hsl(36, 100%, 40%)));
	background-image: -moz-linear-gradient(top, hsl(36, 100%, 60%), hsl(36, 100%, 40%));
	background-image: -ms-linear-gradient(top, hsl(36, 100%, 60%), hsl(36, 100%, 40%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(36, 100%, 60%)), color-stop(100%, hsl(36, 100%, 40%)));
	background-image: -webkit-linear-gradient(top, hsl(36, 100%, 60%), hsl(36, 100%, 40%));
	background-image: -o-linear-gradient(top, hsl(36, 100%, 60%), hsl(36, 100%, 40%));
	background-image: linear-gradient(hsl(36, 100%, 60%), hsl(36, 100%, 40%));
	border-color: hsl(36, 100%, 40%) hsl(36, 100%, 40%) hsl(36, 100%, 35%);
	color: #333;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.33);
	-webkit-font-smoothing: antialiased;
}


.btn.c {
	background-color: hsl(86, 79%, 44%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(86, 79%, 84%)), to(hsl(86, 79%, 44%)));
	background-image: -moz-linear-gradient(top, hsl(86, 79%, 84%), hsl(86, 79%, 44%));
	background-image: -ms-linear-gradient(top, hsl(86, 79%, 84%), hsl(86, 79%, 44%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(86, 79%, 84%)), color-stop(100%, hsl(86, 79%, 44%)));
	background-image: -webkit-linear-gradient(top, hsl(86, 79%, 84%), hsl(86, 79%, 44%));
	background-image: -o-linear-gradient(top, hsl(86, 79%, 84%), hsl(86, 79%, 44%));
	background-image: linear-gradient(hsl(86, 79%, 84%), hsl(86, 79%, 44%));
	border-color: hsl(86, 79%, 44%) hsl(86, 79%, 44%) hsl(86, 79%, 34%);
	color: #333;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.66);
	-webkit-font-smoothing: antialiased;
}

.btn.d {
	background-color: hsl(312, 80%, 43%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(312, 80%, 53%)), to(hsl(312, 80%, 43%)));
	background-image: -moz-linear-gradient(top, hsl(312, 80%, 53%), hsl(312, 80%, 43%));
	background-image: -ms-linear-gradient(top, hsl(312, 80%, 53%), hsl(312, 80%, 43%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(312, 80%, 53%)), color-stop(100%, hsl(312, 80%, 43%)));
	background-image: -webkit-linear-gradient(top, hsl(312, 80%, 53%), hsl(312, 80%, 43%));
	background-image: -o-linear-gradient(top, hsl(312, 80%, 53%), hsl(312, 80%, 43%));
	background-image: linear-gradient(hsl(312, 80%, 53%), hsl(312, 80%, 43%));
	border-color: hsl(312, 80%, 43%) hsl(312, 80%, 43%) hsl(312, 80%, 40.5%);
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.16);
	-webkit-font-smoothing: antialiased;
}

.btn.e {
	background-color: hsl(110, 56%, 16%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(110, 56%, 36%)), to(hsl(110, 56%, 16%)));
	background-image: -moz-linear-gradient(top, hsl(110, 56%, 36%), hsl(110, 56%, 16%));
	background-image: -ms-linear-gradient(top, hsl(110, 56%, 36%), hsl(110, 56%, 16%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(110, 56%, 36%)), color-stop(100%, hsl(110, 56%, 16%)));
	background-image: -webkit-linear-gradient(top, hsl(110, 56%, 36%), hsl(110, 56%, 16%));
	background-image: -o-linear-gradient(top, hsl(110, 56%, 36%), hsl(110, 56%, 16%));
	background-image: linear-gradient(hsl(110, 56%, 36%), hsl(110, 56%, 16%));
	border-color: hsl(110, 56%, 16%) hsl(110, 56%, 16%) hsl(110, 56%, 11%);
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.33);
	-webkit-font-smoothing: antialiased;
}

.btn.f {
	background-color: hsl(0, 69%, 22%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(0, 69%, 42%)), to(hsl(0, 69%, 22%)));
	background-image: -moz-linear-gradient(top, hsl(0, 69%, 42%), hsl(0, 69%, 22%));
	background-image: -ms-linear-gradient(top, hsl(0, 69%, 42%), hsl(0, 69%, 22%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(0, 69%, 42%)), color-stop(100%, hsl(0, 69%, 22%)));
	background-image: -webkit-linear-gradient(top, hsl(0, 69%, 42%), hsl(0, 69%, 22%));
	background-image: -o-linear-gradient(top, hsl(0, 69%, 42%), hsl(0, 69%, 22%));
	background-image: linear-gradient(hsl(0, 69%, 42%), hsl(0, 69%, 22%));
	border-color: hsl(0, 69%, 22%) hsl(0, 69%, 22%) hsl(0, 69%, 17%);
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.33);
	-webkit-font-smoothing: antialiased;
}

.btn.g {
	background-color: hsl(195, 79%, 43%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(195, 79%, 63%)), to(hsl(195, 79%, 43%)));
	background-image: -moz-linear-gradient(top, hsl(195, 79%, 63%), hsl(195, 79%, 43%));
	background-image: -ms-linear-gradient(top, hsl(195, 79%, 63%), hsl(195, 79%, 43%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(195, 79%, 63%)), color-stop(100%, hsl(195, 79%, 43%)));
	background-image: -webkit-linear-gradient(top, hsl(195, 79%, 63%), hsl(195, 79%, 43%));
	background-image: -o-linear-gradient(top, hsl(195, 79%, 63%), hsl(195, 79%, 43%));
	background-image: linear-gradient(hsl(195, 79%, 63%), hsl(195, 79%, 43%));
	border-color: hsl(195, 79%, 43%) hsl(195, 79%, 43%) hsl(195, 79%, 38%);
	color: #333;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.33);
	-webkit-font-smoothing: antialiased;
}

.btn.h {
	background-color: hsl(0, 0%, 16%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(0, 0%, 36%)), to(hsl(0, 0%, 16%)));
	background-image: -moz-linear-gradient(top, hsl(0, 0%, 36%), hsl(0, 0%, 16%));
	background-image: -ms-linear-gradient(top, hsl(0, 0%, 36%), hsl(0, 0%, 16%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(0, 0%, 36%)), color-stop(100%, hsl(0, 0%, 16%)));
	background-image: -webkit-linear-gradient(top, hsl(0, 0%, 36%), hsl(0, 0%, 16%));
	background-image: -o-linear-gradient(top, hsl(0, 0%, 36%), hsl(0, 0%, 16%));
	background-image: linear-gradient(hsl(0, 0%, 36%), hsl(0, 0%, 16%));
	border-color: hsl(0, 0%, 16%) hsl(0, 0%, 16%) hsl(0, 0%, 11%);
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.33);
	-webkit-font-smoothing: antialiased;
}

.btn.i {
	background-color: hsl(214, 37%, 28%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(214, 37%, 62%)), to(hsl(214, 37%, 28%)));
	background-image: -moz-linear-gradient(top, hsl(214, 37%, 62%), hsl(214, 37%, 28%));
	background-image: -ms-linear-gradient(top, hsl(214, 37%, 62%), hsl(214, 37%, 28%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(214, 37%, 62%)), color-stop(100%, hsl(214, 37%, 28%)));
	background-image: -webkit-linear-gradient(top, hsl(214, 37%, 62%), hsl(214, 37%, 28%));
	background-image: -o-linear-gradient(top, hsl(214, 37%, 62%), hsl(214, 37%, 28%));
	background-image: linear-gradient(hsl(214, 37%, 62%), hsl(214, 37%, 28%));
	border-color: hsl(214, 37%, 28%) hsl(214, 37%, 28%) hsl(214, 37%, 19.5%);
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.56);
	-webkit-font-smoothing: antialiased;
}

.btn.j {
	background-color: hsl(41, 85%, 35%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(41, 85%, 59%)), to(hsl(41, 85%, 35%)));
	background-image: -moz-linear-gradient(top, hsl(41, 85%, 59%), hsl(41, 85%, 35%));
	background-image: -ms-linear-gradient(top, hsl(41, 85%, 59%), hsl(41, 85%, 35%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(41, 85%, 59%)), color-stop(100%, hsl(41, 85%, 35%)));
	background-image: -webkit-linear-gradient(top, hsl(41, 85%, 59%), hsl(41, 85%, 35%));
	background-image: -o-linear-gradient(top, hsl(41, 85%, 59%), hsl(41, 85%, 35%));
	background-image: linear-gradient(hsl(41, 85%, 59%), hsl(41, 85%, 35%));
	border-color: hsl(41, 85%, 35%) hsl(41, 85%, 35%) hsl(41, 85%, 29%);
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.39);
	-webkit-font-smoothing: antialiased;
}

.btn.k {
	background-color: hsl(0, 0%, 79%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(0, 0%, 121%)), to(hsl(0, 0%, 79%)));
	background-image: -moz-linear-gradient(top, hsl(0, 0%, 121%), hsl(0, 0%, 79%));
	background-image: -ms-linear-gradient(top, hsl(0, 0%, 121%), hsl(0, 0%, 79%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(0, 0%, 121%)), color-stop(100%, hsl(0, 0%, 79%)));
	background-image: -webkit-linear-gradient(top, hsl(0, 0%, 121%), hsl(0, 0%, 79%));
	background-image: -o-linear-gradient(top, hsl(0, 0%, 121%), hsl(0, 0%, 79%));
	background-image: linear-gradient(hsl(0, 0%, 121%), hsl(0, 0%, 79%));
	border-color: hsl(0, 0%, 79%) hsl(0, 0%, 79%) hsl(0, 0%, 68.5%);
	color: #333;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.69);
	-webkit-font-smoothing: antialiased;
}

.btn.l {
	background-color: hsl(145, 62%, 68%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(145, 62%, 88%)), to(hsl(145, 62%, 68%)));
	background-image: -moz-linear-gradient(top, hsl(145, 62%, 88%), hsl(145, 62%, 68%));
	background-image: -ms-linear-gradient(top, hsl(145, 62%, 88%), hsl(145, 62%, 68%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(145, 62%, 88%)), color-stop(100%, hsl(145, 62%, 68%)));
	background-image: -webkit-linear-gradient(top, hsl(145, 62%, 88%), hsl(145, 62%, 68%));
	background-image: -o-linear-gradient(top, hsl(145, 62%, 88%), hsl(145, 62%, 68%));
	background-image: linear-gradient(hsl(145, 62%, 88%), hsl(145, 62%, 68%));
	border-color: hsl(145, 62%, 68%) hsl(145, 62%, 68%) hsl(145, 62%, 63%);
	color: #333;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.33);
	-webkit-font-smoothing: antialiased;
}

.btn.m {
	background-color: hsl(195, 60%, 35%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(195, 60%, 45%)), to(hsl(195, 60%, 35%)));
	background-image: -moz-linear-gradient(top, hsl(195, 60%, 45%), hsl(195, 60%, 35%));
	background-image: -ms-linear-gradient(top, hsl(195, 60%, 45%), hsl(195, 60%, 35%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(195, 60%, 45%)), color-stop(100%, hsl(195, 60%, 35%)));
	background-image: -webkit-linear-gradient(top, hsl(195, 60%, 45%), hsl(195, 60%, 35%));
	background-image: -o-linear-gradient(top, hsl(195, 60%, 45%), hsl(195, 60%, 35%));
	background-image: linear-gradient(hsl(195, 60%, 45%), hsl(195, 60%, 35%));
	border-color: hsl(195, 60%, 35%) hsl(195, 60%, 35%) hsl(195, 60%, 32.5%);
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.16);
	-webkit-font-smoothing: antialiased;
}

.btn.n {
	background-color: hsl(0, 100%, 82%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(0, 100%, 90%)), to(hsl(0, 100%, 82%)));
	background-image: -moz-linear-gradient(top, hsl(0, 100%, 90%), hsl(0, 100%, 82%));
	background-image: -ms-linear-gradient(top, hsl(0, 100%, 90%), hsl(0, 100%, 82%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(0, 100%, 90%)), color-stop(100%, hsl(0, 100%, 82%)));
	background-image: -webkit-linear-gradient(top, hsl(0, 100%, 90%), hsl(0, 100%, 82%));
	background-image: -o-linear-gradient(top, hsl(0, 100%, 90%), hsl(0, 100%, 82%));
	background-image: linear-gradient(hsl(0, 100%, 90%), hsl(0, 100%, 82%));
	border-color: hsl(0, 100%, 82%) hsl(0, 100%, 82%) hsl(0, 100%, 80%);
	color: #333;
	text-shadow: 0 1px 1px rgba(255, 255, 255, 0.13);
	-webkit-font-smoothing: antialiased;
}

.btn.o {
	background-color: hsl(70, 11%, 23%);
	background-repeat: repeat-x;
	background-image: -khtml-gradient(linear, left top, left bottom, from(hsl(70, 11%, 45%)), to(hsl(70, 11%, 23%)));
	background-image: -moz-linear-gradient(top, hsl(70, 11%, 45%), hsl(70, 11%, 23%));
	background-image: -ms-linear-gradient(top, hsl(70, 11%, 45%), hsl(70, 11%, 23%));
	background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, hsl(70, 11%, 45%)), color-stop(100%, hsl(70, 11%, 23%)));
	background-image: -webkit-linear-gradient(top, hsl(70, 11%, 45%), hsl(70, 11%, 23%));
	background-image: -o-linear-gradient(top, hsl(70, 11%, 45%), hsl(70, 11%, 23%));
	background-image: linear-gradient(hsl(70, 11%, 45%), hsl(70, 11%, 23%));
	border-color: hsl(70, 11%, 23%) hsl(70, 11%, 23%) hsl(70, 11%, 17.5%);
	color: #fff;
	text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.36);
	-webkit-font-smoothing: antialiased;
}

</style>

<script>

function refreshSwatch() {

	var hslvcode = '';
	var code = '';

	var hue = $("#hue").slider("value"),
		saturation = $("#saturation").slider("value"),
		lightness = $("#lightness").slider("value"),
		delta = $("#delta").slider("value"),
		highlight = lightness + delta,
		lowlight = lightness - delta,
		superLowlight = lightness - delta * 1.5,
		gradientTop = "hsl("+hue+", "+saturation+"%, "+highlight+"%)",
		gradientBottom = "hsl("+hue+", "+saturation+"%, "+lowlight+"%)",
		borderBottom = "hsl("+hue+", "+saturation+"%, "+superLowlight+"%)",
		hsl = "hsl("+hue+", "+saturation+"%, "+lightness+"%)",
		highhex = hsl2Hex(hue, saturation, highlight),
		lowhex = hsl2Hex(hue, saturation, lowlight),
		text = getTextColor(lightness, delta),
		css = generateHSLGradient(hsl, gradientTop, gradientBottom, borderBottom, text, highhex, lowhex),
		embeddedCss = css;
		$(".awning.custom").not('.sample').attr('style', css);
		$(".ui-slider-range").css("background", hsl);
		$('#UserAwningCss').html(embeddedCss);
		$('.ui-slider-handle').each(function(){
			var v = $(this).parents('div').slider("value");
			var i = $(this).parents('div').attr('id');
			$("#"+i+"_value").text(v);
			code = hslvcode;
			hslvcode =	code + v + ',';
			$('#UserAwningHslv').val(hslvcode);
		});
}

function getTextColor(lightness, puffiness){
	if(parseInt(lightness) < 50){
		return "color: #fff !important;"
		// \n  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0."+shadowAlpha(puffiness)+");\n  -webkit-font-smoothing: antialiased;
	} else {
		// \n  text-shadow: 0 1px 1px rgba(255, 255, 255, 0."+shadowAlpha(puffiness)+");\n  -webkit-font-smoothing: antialiased;
		return "color: #333 !important;"
	};
}

function shadowAlpha(puffiness){
	var a = parseInt(3.3*puffiness);
	if(a<10){a="0"+a};
	return a;
}

function generateHSLGradient(hsl, highlight, lowlight, superLowlight, text, highhex, lowhex) {
  // return '  background-color: ' + lowlight + ' !important;\n\
  //   background-repeat: repeat-x;\n\
  //   filter: progid:DXImageTransform.Microsoft.gradient(startColorStr="'+highhex+'", endColorStr="'+lowhex+'");\n\
  //   background-image: -khtml-gradient(linear, left top, left bottom, from('+highlight+'), to('+lowlight+'));\n\
  //   background-image: -moz-linear-gradient(top, '+highlight+', '+lowlight+');\n\
  //   background-image: -ms-linear-gradient(top, '+highlight+', '+lowlight+');\n\
  //   background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, '+highlight+'), color-stop(100%, '+lowlight+'));\n\
  //   background-image: -webkit-linear-gradient(top, '+highlight+', '+lowlight+');\n\
  //   background-image: -o-linear-gradient(top, '+highlight+', '+lowlight+');\n\
  //   background-image: linear-gradient('+highlight+', '+lowlight+');\n\
  //   border-color: '+lowlight+' '+lowlight+' '+superLowlight+';\n\
  //   '+text+'\n';
  //  filter: progid:DXImageTransform.Microsoft.gradient(startColorStr="'+highhex+'", endColorStr="'+lowhex+'");\n\ // replaced with hack below
	return '  background-color: ' + lowlight + ' !important;\n\
  background-repeat: repeat-x;\n\
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="'+highhex+'", endColorstr="'+lowhex+'");\n\
  background-image: -khtml-gradient(linear, left top, left bottom, from('+highhex+'), to('+lowhex+'));\n\
  background-image: -moz-linear-gradient(top, '+highhex+', '+lowhex+');\n\
  background-image: -ms-linear-gradient(top, '+highhex+', '+lowhex+');\n\
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, '+highhex+'), color-stop(100%, '+lowhex+'));\n\
  background-image: -webkit-linear-gradient(top, '+highhex+', '+lowhex+');\n\
  background-image: -o-linear-gradient(top, '+highhex+', '+lowhex+');\n\
  background-image: linear-gradient('+highhex+', '+lowhex+');\n\
  border-color: '+lowhex+' '+lowhex+' '+superLowlight+';\n\
  '+text+'\n';
}

function hsl2Hex(h, s, l) {
  var m1, m2, hue;
  var r, g, b
  s /=100;
  l /= 100;
  if (s == 0)
    r = g = b = (l * 255);
  else {
    if (l <= 0.5)
      m2 = l * (s + 1);
    else
      m2 = l + s - l * s;
    m1 = l * 2 - m2;
    hue = h / 360;
    r = HueToRgb(m1, m2, hue + 1/3);
    g = HueToRgb(m1, m2, hue);
    b = HueToRgb(m1, m2, hue - 1/3);
  }
  return "#"+hexify(r) + hexify(g) + hexify(b);
}

function hexify(i){
  var hex = parseInt(i).toString(16);
  if(hex.length == 1){hex="0"+hex};
  return hex;
}

function HueToRgb(m1, m2, hue) {
  var v;
  if (hue < 0)
    hue += 1;
  else if (hue > 1)
    hue -= 1;
  if (6 * hue < 1)
    v = m1 + (m2 - m1) * hue * 6;
  else if (2 * hue < 1)
    v = m2;
  else if (3 * hue < 2)
    v = m1 + (m2 - m1) * (2/3 - hue) * 6;
  else
    v = m1;
  return 255 * v;
}

$(document).ready(function(){

	refreshSwatch();
	$("#hue").slider({
		range: "min",
		max: 360,
		value: <?php echo $hslv['0']; ?>,
		slide: refreshSwatch,
		change: refreshSwatch
	});
	$("#saturation").slider({
		range: "min",
		max: 100,
		value: <?php echo $hslv['1']; ?>,
		slide: refreshSwatch,
		change: refreshSwatch
	});
	$("#lightness").slider({
		range: "min",
		max: 100,
		value: <?php echo $hslv['2']; ?>,
		slide: refreshSwatch,
		change: refreshSwatch
	});
	$("#delta").slider({
		range: "min",
		max: 30,
		value: <?php echo $hslv['3']; ?>,
		slide: refreshSwatch,
		change: refreshSwatch
	});
	$( "#lightness" ).slider( "value", 40 );


	$('#UserAwningCss').hide();
	$('#UserAwningHslv').hide();

	$('.sample').click(function(){
		var h = $(this).data('h');
		var s = $(this).data('s');
		var l = $(this).data('l');
		var p = $(this).data('p');
		$("#hue").slider({value: h});
		$("#saturation").slider({value: s});
		$("#lightness").slider({value: l});
		$("#delta").slider({value:p});
	});

});

</script>

<h2>Vendor Awning Color Tool</h2>

<div class="row">

	<div class="span7 columns">
		<h3>Button Hue <small id="hue_value"></small></h3>
		<div id="hue"></div>
		<h3>Button Saturation <small id="saturation_value"></small></h3>
		<div id="saturation"></div>
		<h3>Button Lightness <small id="lightness_value"></small></h3>
		<div id="lightness"></div>
		<h3>Button Puffiness <small id="delta_value"></small></h3>
		<div id="delta"></div>
		<br /><br />
	</div>

	<div id="instructions" class="span5 offset1 columns">

		<h2>How to Use The Awning Color Generator</h2>

		<h3>First, play with the sliders on the left.</h3>
		<p>Use your arrow keys for extra precision. (Button Puffiness might not affect all browsers.)</p>

	</div>

</div>

<div class="awning custom large" id="awning1"><img id="awning1" class="awning custom large" src="/img/users/awning/default.png">

	<!--<div id="div1">
		<div id="div2">
			<?php //echo $this->Html->image('users/image/'. $user['User']['image']); ?>
		</div>​
	</div>-->

</div>

<div style="margin-left:120px;">
	<?php echo $this->Html->image('users/image/'. $user['User']['image']); ?>
</div>

<br />

<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('id'); ?>


<?php echo $this->Form->input('awning_hslv', array('label' => false)); ?>

<?php echo $this->Form->input('awning_css', array('label' => false)); ?>

<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>


<div class="row">

	<div class="span12 columns">

		<h2>Some Examples!</h2>

		<button class="sample btn custom large a" data-h="193" data-s="32" data-l="64", data-p="15">Alpha</button>
		<button class="sample btn custom large b" data-h="36" data-s="100" data-l="50", data-p="10">Bravo</button>
		<button class="sample btn custom large c" data-h="86" data-s="79" data-l="64", data-p="20">Charlie</button>
		<button class="sample btn custom large d" data-h="312" data-s="80" data-l="48", data-p="5">Delta</button>
		<button class="sample btn custom large e" data-h="110" data-s="56" data-l="26", data-p="10">Echo</button>
		<button class="sample btn custom large f" data-h="0" data-s="69" data-l="32", data-p="10">Foxtrot</button>
		<button class="sample btn custom large g" data-h="195" data-s="79" data-l="53", data-p="10">Golf</button>

		<br />
		<br />

		<button class="sample btn custom large h" data-h="0" data-s="0" data-l="26", data-p="10">Hotel</button>
		<button class="sample btn custom large i" data-h="214" data-s="37" data-l="45", data-p="17">India</button>
		<button class="sample btn custom large j" data-h="41" data-s="85" data-l="47", data-p="12">Juliet</button>
		<button class="sample btn custom large k" data-h="0" data-s="0" data-l="100", data-p="21">Kilo</button>
		<button class="sample btn custom large l" data-h="145" data-s="62" data-l="78", data-p="10">Lima</button>
		<button class="sample btn custom large m" data-h="195" data-s="60" data-l="40", data-p="5">Mike</button>
		<button class="sample btn custom large n" data-h="0" data-s="100" data-l="86", data-p="4">November</button>
		<button class="sample btn custom large o" data-h="70" data-s="11" data-l="34", data-p="11">Oscar</button>

	</div>

</div>


