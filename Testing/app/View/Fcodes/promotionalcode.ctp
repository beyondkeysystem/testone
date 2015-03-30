<div class="section">
    <div class="container">
        <div class="my-order clearfix">
            <div class="row clearfix">
                <?php echo $this->element('fe/account_left');?>


                <div class="col-md-9">
                    <h2>My Promotional Codes</h2>

                    <div class="my-promotional">
                        <div class="reminder-txt">Reminder</div>

                        <ol class="promo-txt">
                            <li>One promotional code can be used once for one order. It cannot be exchanged for cash. It is non-exchangeable nor 	 		         transferable.</li>
                            <li>Each promotional code can only be used once and no partial refund will be made partial usage.</li>
                            <li>Promotional codes can not be used after their expiration date.</li>
                            <li>Where applicable, promotional codes will be sent to your HaRiMau Account 15 days after the order is completed.</li>
                        </ol>


                        <div class="promotional-code clearfix">
                            <h3>Promotional Codes</h3>
                            <h3> &nbsp;&nbsp;&nbsp;<?php echo $this->Html->link('Check Fcode','/fcodes/checkfcode',array('class'=>""));?></h3>
                            <select class="selectpicker">
                                <option>All</option>
                                <option>Ketchup</option>
                                <option>Relish</option>
                            </select>
                        </div>


                        <div class="promo-table">
                            <table width="100%" border="0"  class="promo-table-main">
                                <tr class="promo-table-main-heading">
                                    <td>Code</td>
                                    <td>Details</td>
                                    <td>Valid Until</td>
                                    <td>Amount</td>
                                    <td>Status</td>
                                </tr>
                                <?php if(!empty($results)){?>
                                    <?php foreach($results as $result){?>
                                        <tr class="promo-table-main-heading">
                                            <td><?php echo $result['Fcode']['code'];?></td>
                                            <td><?php echo $result['Product']['name'];?></td>
                                            <td><?php echo $result['Fcode']['date_end'];?></td>
                                            <td><?php echo $result['Product']['price'];?></td>
                                            <td>
                                                <?php
                                                    if($result['Fcode']['status'] == '0')
                                                        echo 'Unused';
                                                    if($result['Fcode']['status'] == '1')
                                                        echo 'Used';
                                                    if($result['Fcode']['status'] == '2')
                                                        echo 'Expired';
                                                    if($result['Fcode']['status'] == '3')
                                                        echo 'All';
                                                    if($result['Fcode']['status'] == '4')
                                                        echo 'Enabled';
                                                    if($result['Fcode']['status'] == '5')
                                                        echo 'Disabled';
                                                ?>
                                            </td>
                                        </tr>
                                    <?php }?>
                                <?php }else{?>
                                <tr>
                                    <td colspan="6">Empty</td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>