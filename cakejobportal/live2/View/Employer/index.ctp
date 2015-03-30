
    <table style="width:100%"class="gridtable gridtbl2C gridtableDMEIndex gridtblC" cellpadding="0" cellspacing="0">
        <tr>
            <th class="headercolor"><?= __('name'); ?></th>
            <th class="headercolor"><?= __('email'); ?></th>
            <th class="headercolor"><?= __('mobile'); ?></th>
            <th class="headercolor"><?= __('address'); ?></th>
        </tr>

        <tr>  
            <td><?php
if (!empty($emp_record['User']['name'])) {
    echo $emp_record['User']['name'];
}
?> </td>
            <td style="width:5px;" ><?php
                if (!empty($emp_record['User']['email'])) {
                    echo $emp_record['User']['email'];
                }
?> </td>
            <td><?php
                if (!empty($emp_record['User']['mobile'])) {
                    echo $emp_record['User']['mobile'];
                }
?> </td>
            <td><?php
                if (!empty($emp_record['User']['address'])) {
                    echo $emp_record['User']['address'];
                }
             //  pr($EmployerName);
           // die('test');
?> </td>

        </tr>

    </table>







