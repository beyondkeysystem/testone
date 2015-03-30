<style type="text/css">

#easyTooltip {
	width: 185px;
	height: 185px;
	background: url(/img/bubble.png) no-repeat;
	color: #fff;
	font-size: 100%;
	font-weight:bold;
	text-align:center;
	position: relative;
	z-index: 10000;
	padding-top: 50px;
	padding-left: 0px;

}

</style>

<script type="text/javascript" src="/js/easyTooltip.js"></script>
<script language="javascript" type="text/javascript">

	$(function() {
		$('map > area').easyTooltip();
	});

</script>

<h3 STYLE="text-align:center">UNITED STATES CULINARY REGIONS</h3>

<!--clickable map image-->

<div style="margin:auto;width:442px">
	<img src="/img/america.png" width="442" height="270" usemap="#US" class="map" style="border-style:none; margin:0" />
</div>

<?php //echo $this->element('worldmap');?>

<!--START MAP CODE-->
<map name="US" id="US">

	<area shape="poly" coords="91,119,56,110,55,168,86,209,104,210,116,194,116,180,128,129" href="us/far-west" title="far-west" />

	<area shape="poly" coords="57,108,145,130,149,105,194,110,196,73,75,47" href="us/northwest" class="inline" title="northwest" />

	<area shape="poly" coords="106,210,144,230,163,229,187,253,232,288,263,251,258,213,215,203,215,185,193,183,152,177,156,142,145,140,145,130,127,127" href="us/southwest" title="southwest" />

	<area shape="poly" coords="197,73,195,110,149,106,145,138,156,140,153,176,215,184,216,201,255,212,253,187,286,187,293,180,274,153,281,137,275,125,240,125,237,75" href="us/midwest" title="mid-west" />

	<area shape="poly" coords="238,74,240,124,275,125,282,136,275,152,292,180,299,171,319,161,336,162,345,150,344,132,327,116,320,100,281,82" href="us/great-lakes" title="great-lakes" />

	<area shape="poly" coords="259,215,263,248,293,252,295,240,291,234,278,233,281,215" href="#" />

	<area shape="poly" coords="295,239,309,239,309,230,353,230,356,217,336,194,288,197,286,186,252,186,254,211,280,214,278,233" href="#" />

	<area shape="poly" coords="311,239,328,243,344,248,355,291,372,285,373,266,354,229,308,230,309,238" href="#" title="florida" />

	<area shape="poly" coords="357,217,336,192,288,197,292,181,299,171,318,161,336,162,344,151,346,142,350,149,365,149,373,157,380,163,389,180" href="#" />

	<area shape="poly" coords="344,128,347,144,365,148,381,164,388,157,391,135,401,128,389,128,389,113,384,91,358,109" href="#" />

	<area shape="poly" coords="384,89,390,112,390,127,401,127,415,118,406,108,426,86,410,63" href="#" />

	<area shape="poly" coords="283,291,303,297,325,320,335,312,322,299,288,285,283,290" href="#" />

</map>
<!--EOF Map Code-->



