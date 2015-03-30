 <div class="mydiv">
          
                <div class="top">
                    <div class="actions">
                        <ul>
                            <li><?php echo $this->Html->link(__('Home'), array('action' => 'index')); ?></li>
                            
                            <li><?php echo $this->Html->link(__('Edit Profile'), array('action' => 'edit', $user['id'])); ?></li>
                           
                            <li><?php echo!empty($user) ? $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')) : ''; ?></li>
                            
                        </ul>

                    </div>
                    <div class="loginName"><h align="center"><?php echo ucfirst($EmployerName) . " " . "(" . ucfirst($user['type']) . ")"; ?></h></div>
                </div>
                <div class="bandiv">
                    <?php $path = $this->webroot;
                    $path_img = $path . "img/logo.png"; ?>
                    <table class="badivtbl">

                        <tr>
                            <td class="badivtd">
                     
                              <div><?php echo $this->Html->link(__('Add Post'), array('action' => 'postadd')); ?> </div>
                              <div><?php echo $this->Html->link(__('Messages'), array('controller' => 'im','action' => 'index?id=MTMzNQ==')); ?> </div>
                            </td><td class="badivtd banIcode"><div class="headerh4-h5"><h4 align="center">RecruitYoung</h4><br><h3 align="center"><?php echo ucfirst($action_detail); ?></h3></div></td><td style="position: relative;"><div class="imgtag"><?php echo $this->Html->image($path_img, array('alt' => ' ','class'=>array('imgtagStyle'))); ?></div></td>
                        </tr>
                       

                    </table>

                </div>
            </div>