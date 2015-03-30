<div id="menycontainer" class="menuWhite">
<p class="blViewCaption"><?php  echo $blViewCaption; ?></p>
<ul id="meny">
</ul>
</div>

<?php if(!empty($bl_message)) echo "<P class='bl_message'>{$bl_message}</P>";?>

<div class="blForm">
	<form action="" name="bl_newgroup" enctype="application/x-www-form-urlencoded" method="post" target="_self">
		<table border="0" cellspacing="1" cellpadding="1" class="csc-mailform">
			<tr>
				<td class="csc-form-labelcell">
					<p class="csc-form-label-req">Namn</p>
				</td>
				<td class="csc-form-fieldcell">
					<input type="text" name="data[Role][alias]" size="40" value="" />
				</td>
			</tr>
      		<tr>
      			<td class="csc-form-labelcell">
      				<p class="csc-form-label"></p>
      			</td>
      			<td class="csc-form-fieldcell">
				<input type="hidden" name="data[Aro][lft]" value="<?php echo $lft;?>" />
      				<input type="submit" name="data[blForm][create_usergroup]" value="Spara" />
      				<input type="submit" name="data[blForm][cancel_create]" value="Avbryt" />
      			</td>
      		</tr>
		</table>
      </form>
</div>
