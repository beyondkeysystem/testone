<div id="replace"><input type="hidden" value='<?php echo json_encode($chart_date);?>' id="chart_date" />
<input type="hidden" value='<?php echo json_encode($chart_price);?>' id="chart_price" />
<input type="hidden" value="<?php echo $id_chart; ?>" id="id_chart" />
<input type="hidden" value="<?php echo $next_id_chart; ?>" id="next_id_chart" />
<input type="hidden" value="<?php echo $property_chart[0]['property_name']?>" id="property_name" />
</div>
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
  function homegraph(){
   var nextid = $("#next_id_chart").val();
   var previousid = $("#id_chart").val();
    $('#arrowL').show();
    $('#arrowR').show();
   if (nextid==0) {
   $('#arrowR').hide();
   }
   
   if (previousid==0) {
   $('#arrowL').hide();
   }
  
    var data1=$('#chart_price').val();
  var data2=$('#chart_date').val();
  var property_name=$('#property_name').val();
  var date1 = new Array();
   var price1 = new Array();
  data1 = JSON.parse(data1);
  data2 = JSON.parse(data2);
  $.each(data1, function(key, values){
     price1[key] = parseInt(values);
     //console.log(values);
  });
  $.each(data2, function(key, values){
      //console.log(values);
     date1[key] = values;
  });
  
  $(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: '<?=$this->lang->line("monthly_average_price")?>'
        },
        subtitle: {
            text: '<?=$this->lang->line("source")?>'
        },
        xAxis: {
            categories: date1
        },
        yAxis: {
            min: 0,
            title: {
                text: '<?=$this->lang->line("search_price")?> (MYR)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} MYR</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: property_name,
            data: price1

        }]
    });
});
  }
   $(document).ready(function() {
    
    var $item = $('div.item'),
       visible = 1, //Set the number of items that will be visible
        index = 0, //Starting index
        endIndex = (11 / visible ) - 1; //End index
    
    $('#arrowR').click(function(){
      
        // ajax data show on div list item
        var propid = $("#next_id_chart").val();
        //alert(propid);
         $.ajax({
        type:"POST",
        data : 'propid='+propid,
        url : "<?php echo base_url(); ?>chart",
        success : function(response) {
           // data = response;
            $('#replace').html(response).show();
	     homegraph();
        },
        error: function() {
            alert('Error occured1');
	   
	   
        }
        });
     
     // return false;

        //if(index < endIndex ){
        //  index++;
        //  $item.animate({'left':'-=300px'});
        //}
    });
    
    $('#arrowL').click(function(){
         var propid = $("#id_chart").val();
         //alert(propid);
        //if(index > 0){
        //  index--;            
        //  $item.animate({'left':'+=300px'});
        //}
         $.ajax({
        type:"POST",
        data : 'propid='+propid,
        url : "<?php echo base_url(); ?>chart",
        success : function(response) {
           // data = response;
            $('#replace').html(response).show();
	     homegraph();
        },
        error: function() {
            alert('Error occured1');
	   
	   
        }
        });
       
    });
    
});
   
   
   $(document).ready(function(){
      homegraph();
       $('#arrowL').hide();
    });
 //homegraph();
</script>

<!--Graph-->
  <div class="graph_section">
    <div class="title">
      <h3><?=$this->lang->line('increasing_price_chart')?></h3>
    </div>
    <div class="graph_txt"> <strong><?=$this->lang->line('increasing_price_chart_title')?></strong>
      <p><?=$this->lang->line('increasing_price_chart_content')?></p>
    </div>
    <div class="graph">
      <div id="container_graph">
      <div id="list-container">
        <div class='list'>
            <div class='item'>
      
      <div id="container" style="min-width: 100%; height: 362px; margin: 0 auto"></div><img id="arrowL"  src="<?php echo base_url(); ?>assets/front/images/previous.png" width="45" height="45" class="chart_pre" /><img id="arrowR" src="<?php echo base_url(); ?>assets/front/images/next-button.png" width="45" height="45" class="chart_next" /></div>
            
            </div>
        </div>
      </div>
      </div>
     </div>
    <div class="clear"></div>
  </div>
  <!--/.Graph--> 
</div>
<!--/.Wrapper(THis wrapper start in property_listing)--> 