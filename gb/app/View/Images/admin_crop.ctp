<?php echo $this->Html->css(array('jquery.Jcrop.css')); ?>
<?php echo $this->Html->script(array('http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js')); ?>
<?php echo $this->Html->script(array('jquery.Jcrop.js')); ?>

<script language="Javascript">
$(function(){
	$('#cropbox').Jcrop({
		trueSize: [<?php echo $src_width; ?>, <?php echo $src_height; ?>],
		aspectRatio: <?php echo $width; ?> / <?php echo $height; ?>,
		minSize: [<?php echo $width; ?>,<?php echo $height; ?>],
		onSelect: showPreview,
		onChange: showPreview,
	});
	$('#process').click(function() {
		if (parseInt($('#w').val())) return true;
		alert('Please select a crop region then press submit.');
		return false;
	});
});

function showPreview(c){
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
	if (parseInt(c.w) > 0){
		var rx = <?php echo $width; ?> / c.w;
		var ry = <?php echo $height; ?> / c.h;
		$('#preview').css({
			width: Math.round(rx * <?php echo $src_width ;?>) + 'px',
			height: Math.round(ry * <?php echo $src_height ;?>) + 'px',
			marginLeft: '-' + Math.round(rx * c.x) + 'px',
			marginTop: '-' + Math.round(ry * c.y) + 'px'
		});
	}
}
</script>

Source Filename: <?php echo $src_filename; ?>
<br />
Width: <?php echo $src_width; ?>
<br />
Height: <?php echo $src_height; ?>
<br />
Destination Filename: <?php echo $dst_filename; ?>
<br />
Width: <?php echo $width; ?>
<br />
Height: <?php echo $height; ?>
<br />
<br />

<table style="margin-left:40px;margin-top:300px">
	<tr>
		<td><?php echo $this->Html->image($src_fileweb . '?' . date('now'), array('id' => 'cropbox', 'style' => 'float: left; margin-right: 10px;', 'width' => $width)); ?></td>
	</tr>
	<tr>
		<td>
			<br /><br />
		</td>
	</tr>
	<tr>
		<td><div style="width:<?php echo $width; ?>px;height:<?php echo $height; ?>px;overflow:hidden;"><?php echo $this->Html->image($src_fileweb.'?'.date('now'), array('id' => 'preview')); ?></div></td>
	</tr>
</table>

<br />
<br />

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'images', 'action' => 'crop', 'admin' => true))); ?>
<input type="hidden" name="data[Image][referer]" value="<?php echo $referer; ?>" />
<input type="hidden" name="data[Image][src_filename]" value="<?php echo $src_filename; ?>" />
<input type="hidden" name="data[Image][dst_filename]" value="<?php echo $dst_filename; ?>" />
<input type="hidden" name="data[Image][width]" value="<?php echo $width; ?>" />
<input type="hidden" name="data[Image][x]" value="" id="x" />
<input type="hidden" name="data[Image][y]" value="" id="y" />
<input type="hidden" name="data[Image][w]" value="" id="w" />
<input type="hidden" name="data[Image][h]" value="" id="h" />
<input type="submit" name="upload_thumbnail" value="Crop Image" id="process" class="btn" />
</form>

<br />
<br />
