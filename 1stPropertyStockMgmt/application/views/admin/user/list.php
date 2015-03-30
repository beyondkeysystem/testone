     <script>
    
    function ConfirmDialog() {
  var x=confirm("Are you sure to delete record?")
  if (x) {
    return true;
  } else {
    return false;
  }
}
  </script>
   
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
         <?php $url2=$this->uri->segment(2);
          $url2=str_replace("_"," ",$url2);
          ?>
            Active <?php echo ucfirst($url2);?>
          <a  href="<?php echo site_url("admin").'/'.$this->uri->segment(2); ?>/add" class="btn btn-success">Add a new</a>
        </h2>
      </div>
      <div class="row">
            <div class="span12 columns">
                <div class="well">
                    
                    <form id="myform" class="form-inline reset-margin" accept-charset="utf-8" method="post" action="">
                        <div class="row-fluid">
                            <div class="span3">
                                <label for="property_name">
                                    <b>Email</b>
                                </label>
                                <br>
                                <input type="text" placeholder="Search by Email" value="<?php if(isset($email) and $email !='') echo $email?>" id="email" name="email">   
                            </div>
                            <div class="span3">
                                <label for="location">
                                    <b>Hp. N.</b>
                                </label><br>
                                <input type="text" placeholder="Search by Hp. N." value="<?php if(isset($tel_no) and $tel_no !='') echo $tel_no?>" name="tel_no" >                
                            </div>
                            <div class="span3">
                                <label for="location">
                                    <b>Username</b>
                                </label><br>
                                <input type="text" placeholder="Search by Username" value="<?php if(isset($username) and $username !='') echo $username?>" name="username" >                
                            </div>
                            <div class="span3">
                                <label for="location">
                                    <b>Name</b>
                                </label><br>
                                <input type="text" placeholder="Search by name" value="<?php if(isset($name) and $name !='') echo $name?>" name="name">                
                            </div>
                        </div>
                        <br><input type="submit" class="btn btn-info search" value="Search  " name="mysubmit">              
                    </form>
                </div>
            </div>

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
                <th class="green header">Name</th>
                <th class="red header">Email Address</th>
                <th class="red header">User Name</th>
                <th class="red header">Last Login</th>
		            <th class="red header">Role</th>
                <th class="red header">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $uri = $this->uri->segment(3);
              if(isset($uri) and $uri !=''){
                  
                  $i = $uri+1;
              }else{
                  $i=1;
              }
              foreach($user as $row)
              {
                echo '<tr>';
                echo '<td>'.$i.'</td>';
                echo '<td>'.$row['first_name'];//.' '.$row['last_name'].' <a href="'.base_url().'admin/user/view/'.$row['id'].'" style="float:right;text-decoration:none"><i class="icon-info-sign" ></i></a></td>';
                echo '<td>'.$row['email_addres'].'</td>';
                echo '<td>'.$row['user_name'].'</td>';
                echo '<td>'.$row['last_login'].'</td>';
                echo '<td>'.$row['role'].'</td>';
                /*echo '<td class="crud-actions">
                  <a href="'.site_url("admin").'/user/update/'.$row['id'].'" class="btn btn-info">Edit</a>  
                  <a href="'.site_url("admin").'/user/delete/'.$row['id'].'" class="btn btn-danger" onclick="return ConfirmDialog();" >delete</a>
                </td>';*/
                
                ?>
            <td class="crud-actions">
                <a href="<?php echo base_url().'admin/user/view/'.$row['id']?>" class="btn btn-info">View</a>
            </td>
                <?php
                echo '</tr>';
                $i++;
              }
              ?>      
            </tbody>
          </table>
            <div style="clear: both;"></div>
      <?php echo '<div class="pagination">'.$this->pagination->create_links().'</div>'; ?>

      </div>
    </div>