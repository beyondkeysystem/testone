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
       <h2>
           <?php echo ucfirst($url2);?>
          <!--<a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>-->
        </h2>
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
                <th class="header">Sr No</th>
                <th class="green header">Roles</th>
                <th class="red header">Charges</th>
                <th class="red header">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i=1;
              foreach($roles as $row)
              {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row['roles'].'</td>';
                echo '<td>MYR  '.$row['charges'].'</td>';
                echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/roles/update/'.$row['id'].'" class="btn btn-info">Edit</a>  

                </td>';
                echo '</tr>';
                $i++;
              }
              ?>      
            </tbody>
          </table>


      </div>
    </div>