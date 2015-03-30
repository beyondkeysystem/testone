    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
           <?php $url2=$this->uri->segment(2);
          $url2=str_replace("_"," ",$url2);
          ?>
            <?php echo ucfirst($url2);?>
        </li>
      </ul>

      <div class="page-header users-header">
       
      </div>
      
      <div class="row">
        <div class="span12 columns">
       
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
           
          
           
            //save the columns names in a array that we will use as filter         
         
            ?>

  

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="header">#</th>
                <th class="green header">First Name</th>
                <th class="red header">Last Name</th>
                <th class="red header">Email Address</th>
                <th class="red header">User Name</th>
                <th class="red header">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach($user as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['first_name'].'</td>';
                echo '<td>'.$row['last_name'].'</td>';
                echo '<td>'.$row['email_addres'].'</td>';
                echo '<td>'.$row['user_name'].'</td>';

                
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/user/update/'.$row['id'].'" class="btn btn-info">view & edit</a>  

                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>


      </div>
    </div>