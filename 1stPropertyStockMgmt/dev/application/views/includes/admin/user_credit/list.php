    <div class="container top">

      <ul class="breadcrumb">
        <li>
          <a href="<?php echo site_url("admin"); ?>">
            <?php echo ucfirst($this->uri->segment(1));?>
          </a> 
          <span class="divider">/</span>
        </li>
        <li class="active">
             <?php $url_2=$this->uri->segment(2);
          $url_2=str_replace("_"," ", $url_2);
          ?>
          <?php echo ucfirst($url_2);?>
        </li>
      </ul>

      <div class="page-header users-header">
        <h2>
             <?php $url_2=$this->uri->segment(2);
          $url_2=str_replace("_"," ", $url_2);
          ?>
          <?php echo ucfirst($url_2);?>
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
      </div>
      
      <div class="row">
        <div class="span12 columns">
         
           
            <?php
           
            $attributes = array('class' => 'form-inline reset-margin', 'id' => 'myform');
          ?>

         

          <table class="table table-striped table-bordered table-condensed">
            <thead>
              <tr>
                <th class="">#</th>
                <th class="green">User Id</th>
                <th class="green">User Name</th>
                <th class="yellow  headerSortDown">Credit</th>
               <th class="red">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php
        
              foreach($user_credit as $row)
              {
                echo '<tr>';
                echo '<td>'.$row['id'].'</td>';
                echo '<td>'.$row['user_id'].'</td>';
                echo '<td>'.$row['username'].'</td>';
                echo '<td>'.$row['credit'].'</td>';
                echo '<td class="">
                  <a href="'.site_url("admin").'/user_credit/update/'.$row['id'].'" class="btn btn-info">view & edit</a>
                  <a href="'.site_url("admin").'/user_credit/detail/'.$row['user_id'].'" class="btn btn-info">view detail</a>
                   <a href="'.site_url("admin").'/user_credit/delete/'.$row['id'].'" class="btn btn-danger">delete</a>
                </td>';
                echo '</tr>';
              }
              ?>      
            </tbody>
          </table>

      </div>
    </div>