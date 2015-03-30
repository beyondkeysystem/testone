 <div class="mydiv">
          
                <div class="top">
                    <div class="actions">
                        <ul>
                           <li><?php echo!empty($user) ? $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')) : ''; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="bandiv">
                    <?php $path = $this->webroot;
                    $path_img = $path . "img/logo.png"; ?>
                    <table class="badivtbl">

                        <tr>
                            <td class="badivtd"><div>  </div></td><td class="badivtd banIcode"><div class="headerh4-h5"><h4 align="center">iCode&trade; Connect</h4><br><h3 align="center"><?php echo ucfirst($action_detail); ?></h3></div></td><td style="position: relative;"><div class="imgtag"><?php echo $this->Html->image($path_img, array('alt' => ' ','class'=>array('imgtagStyle'))); ?></div></td>
                        </tr>
                       

                    </table>

                </div>
            </div>