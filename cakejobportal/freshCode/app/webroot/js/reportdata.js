function send_data()
{
    var icode = $('#icode').val();
    var serial_no = $('#serial_no').val();
    var patient_id=$('#pid').val();
    $.ajax({
       
        type: 'POST',
        url: '/icodes/add_report',
        data: '&patient_id='+patient_id+'&icode='+icode+'&serial_no='+serial_no+'&action=insert',
        success: function(msg){
            //redirect to patient home page   
            window.location.href = '/patients/myreport';
          
        },
        error: function(){
            $.colorbox({
                html:'Invalid string,please insert currect string', 
                height:'250',
                width:'400',
                overlayClose:false,
                escKey:true,
                fixed:true
            });
        
        }
    });
   
}