<style>
 div.view{border-left:none !important;margin-top:-18% !important;}
</style>
<div style="padding:0;float:none !important;"class="view users index">   
      <table class="gridtable gridtbl2 gridtableDMEIndex"  cellpadding="0" cellspacing="0">
        <tr>
            <th class="headercolor"><?= __('name'); ?></th>
            <th class="headercolor"><?= __('email'); ?></th>
            <th class="headercolor"><?= __('mobile'); ?></th>
            <th class="headercolor"><?= __('address'); ?></th>
        </tr>

        <tr>  
            <td><?php
        if (!empty($dme_data['User']['name'])) {
            echo $dme_data['User']['name'];
        }
        ?> </td>
            <td><?php
        if (!empty($dme_data['User']['email'])) {
            echo $dme_data['User']['email'];
        }
        ?> </td>
            <td><?php
                if (!empty($dme_data['User']['mobile'])) {
                    echo $dme_data['User']['mobile'];
                }
        ?> </td>
            <td><?php
                if (!empty($dme_data['User']['address'])) {
                    echo $dme_data['User']['address'];
                }
        ?> </td>
           
        </tr>

    </table>







