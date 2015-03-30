<div class="section">
            <div class="container">


                <div class="my-order clearfix">
                    <div class="row clearfix">
                        <?php echo $this->element('fe/account_left');?>


                        <div class="col-md-9">
                            <h2><?php echo __('My Promotional Codes'); ?></h2>

                            <div class="my-promotional">
                                <div class="reminder-txt"><?php echo __('Reminder'); ?></div>

                                <ol class="promo-txt">
                                    <li><?php echo __('One promotional code can be used once for one order. It cannot be exchanged for cash. It is non-exchangeable nor                     transferable.'); ?></li>
                                    <li><?php echo __('Each promotional code can only be used once and no partial refund will be made partial usage.'); ?> </li>
                                    <li><?php echo __('Promotional codes can not be used after their expiration date.'); ?></li>
                                    <li><?php echo __('Where applicable, promotional codes will be sent to your HaRiMau Account 15 days after the order is completed.'); ?></li>
                                </ol>


                                <div class="promotional-code clearfix">
                                    <h3>    <?php echo __('Promotional Codes');?></h3>
                                    <select class="selectpicker">
                                        <option><?php echo __('All'); ?></option>
                                        <option><?php echo __('Ketchup'); ?></option>
                                        <option><?php echo __('Relish'); ?></option>
                                    </select>
                                </div>


                                <div class="promo-table">
                                    <table width="100%" border="0"  class="promo-table-main">
                                        <tr class="promo-table-main-heading">
                                            <td><?php echo __('Code');?></td>
                                            <td><?php echo __('Details'); ?></td>
                                            <td><?php echo __('Valid Until'); ?></td>
                                            <td><?php echo __('Amount'); ?></td>
                                            <td><?php echo __('Additional Info'); ?></td>
                                            <td><?php echo __('Status'); ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"><?php echo __('Empty'); ?></td>
                                        </tr>
                                    </table>

                                </div>


                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>