<input type="hidden" value='<?php echo json_encode($chart_date);?>' id="chart_date" />
<input type="hidden" value='<?php echo json_encode($chart_price);?>' id="chart_price" />
<input type="hidden" value="<?php echo $id_chart; ?>" id="id_chart" />
<input type="hidden" value="<?php echo $next_id_chart; ?>" id="next_id_chart" />
<input type="hidden" value="<?php echo $property_chart[0]['property_name']?>" id="property_name" />

<!--<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>
<script>
$( document ).ready(function() {
    var data_next=$('#chart_price_next').val();
  var data_next2=$('#chart_date_next').val();
  var date = new Array();
  date.length = 0;
   var price = new Array();
  price.length = 0;
  data1 = JSON.parse(data1);
  data2 = JSON.parse(data2);
 console.log(data1);
 console.log(data2);
  
  $.each(data1, function(key, values){
    price[key] = parseFloat(values);
    console.log(values);
  });
  $.each(data2, function(key, values){
     date[key] = values;
  });
   });
console.log(date);
console.log(price);
  $(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Monthly Average Price'
        },
        subtitle: {
            text: 'Source: Myviko.com'
        },
        xAxis: {
            categories: date
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Price (MYR)'
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
            name: 'propert2',
            data: price

        }]
    });
});
</script>

 <div id="container_graph">
      <div id="arrowL" class="arrowL">
      </div>
      <div id="arrowR2" class="arrowR">
      </div>
      <div id="list-container">
        <div class='list'>
            <div class='item'>
      
      <div id="container" style="min-width: 565px; height: 362px; margin: 0 auto"></div><img id="arrowL"  src="<?php echo base_url(); ?>assets/front/images/previous.png" width="45" height="45" class="chart_pre" /><img id="arrowR" src="<?php echo base_url(); ?>assets/front/images/next-button.png" width="45" height="45" class="chart_next" /></div>
            <input type="hidden" value="<?php echo $id_chart; ?>" id="id_chart" />
            <input type="hidden" value="<?php echo $next_id_chart; ?>" id="next_id_chart" /> 
            </div>
            
            
        </div>
      </div>
      </div>
     </div>-->
     
     
     <script>
        $(document).ready(function(){
            $("text[text-anchor='end']").remove();    
        });
        
     </script>