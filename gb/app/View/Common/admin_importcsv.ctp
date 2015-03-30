<h2>Import <?php echo Inflector::pluralize($modelClass);?> from CSV data file</h2>

<?php echo $this->Form->create($modelClass, array('action' => 'importcsv', 'type' => 'file'));  ?>
<?php echo $this->Form->input('CsvFile', array('label' => '', 'type' => 'file')); ?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>