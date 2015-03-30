<div class="visitors view">
<h2><?php  echo __('Visitor'); ?></h2>
<dl>
<dt><?php echo __('Id'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['id']); ?>
&nbsp;
</dd>
<dt><?php echo __('Host'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['host']); ?>
&nbsp;
</dd>
<dt><?php echo __('Url'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['url']); ?>
&nbsp;
</dd>
<dt><?php echo __('Referrer'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['referrer']); ?>
&nbsp;
</dd>
<dt><?php echo __('Keyword'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['keyword']); ?>
&nbsp;
</dd>
<dt><?php echo __('Ip'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['ip']); ?>
&nbsp;
</dd>
<dt><?php echo __('Remotehost'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['remotehost']); ?>
&nbsp;
</dd>
<dt><?php echo __('Useragent'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['useragent']); ?>
&nbsp;
</dd>
<dt><?php echo __('Country Code'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['country_code']); ?>
&nbsp;
</dd>
<dt><?php echo __('Region'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['region']); ?>
&nbsp;
</dd>
<dt><?php echo __('City'); ?></dt>
<dd>
<?php echo h($visitor['Visitor']['city']); ?>
&nbsp;
</dd>
<dt>Created</dt>
<dd>
<?php echo h($visitor['Visitor']['created']); ?>
&nbsp;
</dd>
</dl>
</div>

