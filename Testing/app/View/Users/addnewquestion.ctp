<?php echo $this->Form->create('Emailmodel', array('url'=>'/users/change_phone','id' => 'questionform')); ?>
<h2>Account verification <a class="close-arrow" href="javascript:void(0)" id="close4"> <i class="fa fa-close"></i> </a> </h2> 
<div class="number-phone">
    Enter your question
</div>
<div class="field-area clearfix">
    <div class="main-row clearfix">
        <?php $options = array(
          'Name of your maternal grandmother'=>'Name of your maternal grandmother',
          'Name of your maternal grandfather'=>'Name of your maternal grandfather',
          'Name of your paternal grandfather'=>'Name of your paternal grandfather',
          'Name of your paternal grandmother'=>'Name of your paternal grandmother',
          'Your Father\'s birthday'=>'Your Father\'s birthday',
          'Your Mother\'s birthday'=>'Your Mother\'s birthday',
          'Number of days between your parents’ birthdays'=>'Number of days between your parents’ birthdays',
          'Name of your 12th-grade Math teacher'=>'Name of your 12th-grade Math teacher',
          'Name of your 6th-grade Math teacher'=>'Name of your 6th-grade Math teacher',
          'Name of the university where you attended undergrad'=>'Name of the university where you attended undergrad',
          'Name of your roommate in college'=>'Name of your roommate in college',
          'Name of your tutor in college'=>'Name of your tutor in college',
          'What’s your nickname at home?'=>'What’s your nickname at home?',
          'The last 6 digits of your ID number'=>'The last 6 digits of your ID number',
          'Name of the hospital in which you were born'=>'Name of the hospital in which you were born',
          'Name of your best friend'=>'Name of your best friend',
          'Name of your first pet'=>'Name of your first pet',
          'Name of your first boyfriend/girlfriend'=>'Name of your first boyfriend/girlfriend',
          'Name of your first employer'=>'Name of your first employer',
          'Wedding anniversary'=>'Wedding anniversary',
          'Spouse\'s name'=>'Spouse\'s name',
          'Spouse\'s birthday'=>'Spouse\'s birthday',
        );?>
        <?php echo $this->Form->select('question',$options, array('class' => "field-area-left", 'required' => false)) ?>
    </div>
    <div id="Error_question"></div>
    <div class="main-row questioncls clearfix">
        <?php echo $this->Form->text('answer', array('class' => "field-area-left", 'placeholder' => "Answer", 'required' => false)) ?>
    </div>
    <div id="Error_answer"></div>
        
</div>
<div class="submit-row">
    <input type="button" onclick="return fnchange_question();" value="Submit" name="phone" class="subnit-btn">
    <p> <a href="javascript:void(0)">	<i class="fa fa-question-circle"></i>   Did not receive a code?  </a> </p>
    <p> Not working ?  <a href="javascript:void(0)"> Try this instead </a></p>
</div>
</div>
