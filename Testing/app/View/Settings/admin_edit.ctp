<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button data-original-title="Save" type="submit" form="form-setting" data-toggle="tooltip" title="" class="btn btn-primary" name="save"><i class="fa fa-save"></i></button>
        <?php
          /*echo $this->html->link(
            '<i class="fa fa-reply"></i>',
            array('controller' => 'tickets', 'action' => 'index'),array('class' => 'btn btn-default', 'escape' => false, 'data-original-title' => ' Cancel', 'data-toggle'=> 'tooltip')
        );*/
        ?>
      </div>
      <h1>Mail Setting</h1>
    </div>
  </div>
  <div class="container-fluid">
        <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> Mail Setting</h3>
      </div>
      <div class="panel-body">

        <!-- <form action="http://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;token=e3b2c81726bb1b0dd7faa24ed2378064&amp;product_id=42" method="post" enctype="multipart/form-data" id="form-product" class="form-horizontal"> -->
        <?php
          echo $this->Form->create('Setting',array('type' => 'file', 'class' => 'form-horizontal', 'id' => 'form-setting'));
        ?>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
              <div class="tab-content">
                <div class="tab-pane active" id="language1">
                    <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name1">Company Name</label>
                    <div class="col-sm-10">
                      <?php
                        echo $this->Form->input('MailSetting.company_name',array(
                            'type' => 'text',
                            'label' => false,
                            'placeholder' => 'Company Name',
                            'class' => 'form-control',
                            'required' => 'required'
                          ));
                      ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-name1">Mail Sending Protocol</label>
                    <div class="col-sm-10">
                      <?php 
                        $mail_sending = array('mail'=>'PHP Mail()', 'SMTP'=>'SMTP');
                        echo $this->Form->input('MailSetting.mail_protocol',array(
                            'options' => array($mail_sending),
                            'label' => false,
                            'class' => 'form-control',
                            
                          ));
                      ?>
                    </div>
                  </div>
                  <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name1">System Mails From</label>
                    <div class="col-sm-10">
                      <?php 
                        echo $this->Form->input('MailSetting.email',array(
                            'type' =>'email',
                            'label' => false,
                            'class' => 'form-control',
                            
                            ));
                      ?>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="col-sm-2 control-label" for="input-name1"></label>
                    <div class="col-sm-10">
                      <div class="badge badge-important"> Below fields are required only if you select SMTP above </div><br/>
                    </div> 
                  </div>
                  <div class="form-group ">
                    <label class="col-sm-2 control-label" for="input-name1">SMTP Host</label>
                    <div class="col-sm-10">
                      <?php
                        echo $this->Form->input('MailSetting.smtp_host',array(
                            'type' => 'text',
                            'label' => false,
                            'placeholder' => 'SMTP Host',
                            'class' => 'form-control',
                            
                          ));
                      ?>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                    <label class="col-sm-2 control-label" for="input-name1">SMTP Username</label>
                    <div class="col-sm-10">
                      <?php
                        echo $this->Form->input('MailSetting.smtp_user',array(
                            'type' => 'text',
                            'label' => false,
                            'placeholder' => 'SMTP Username',
                            'class' => 'form-control',
                            
                          ));
                      ?>
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <label class="col-sm-2 control-label" for="input-name1">SMTP Password</label>
                  <div class="col-sm-10">
                    <?php
                      echo $this->Form->input('MailSetting.smtp_pass',array(
                          'type' => 'password',
                          'label' => false,
                          'placeholder' => 'SMTP Password',
                          'class' => 'form-control',
                          
                        ));
                    ?>
                  </div>
                </div>
                <div class="form-group ">
                  <label class="col-sm-2 control-label" for="input-name1">SMTP Port</label>
                  <div class="col-sm-10">
                    <?php
                      echo $this->Form->input('MailSetting.smtp_port',array(
                          'type' => 'text',
                          'label' => false,
                          'placeholder' => 'SMTP Port',
                          'class' => 'form-control',
                          
                        ));
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?=$this->Form->end();?>
      </div>
    </div>
  </div>