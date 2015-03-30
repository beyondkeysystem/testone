<?php if (!empty($report_data)) { ?>

    <div class="users index">

        <div style="align:top">
            <h3 align="left">Patient Report</h3>
            <table class="gridtable">
                <tr>
                    <th class="headercolor"><?= __('iCode '); ?></th> 
                    <th class="headercolor"><?= __('Serial no. '); ?></th>
                    <th class="headercolor"><?= __('iCode Period '); ?></th>
                    <th class="headercolor"><?= __('Days'); ?></th>
                    <th class="headercolor"><?= __('Minutes'); ?></th>
                    <th class="headercolor"><?= __('Avg Pressure'); ?></th>
                    <th class="headercolor"><?= __('P95'); ?></th>
                    <th class="headercolor"><?= __('Best30'); ?></th>
                    <th class="headercolor"><?= __('AHI '); ?></th>
                    <th class="headercolor"><?= __('SNI'); ?></th>
                     <th class="headercolor"><?= __('Complician'); ?></th>
                    <th class="headercolor"><?= __('Created Date'); ?></th>
                </tr>
                <tr>
                    <?php foreach ($report_data as $report_datas) { ?>
                        <td><?php
                if (!empty($report_datas['Report']['icode'])) {
                    echo $report_datas['Report']['icode'];
                } else {
                    echo "00";
                }
                        ?></td> 
                        <td><?php
                    if (!empty($report_datas['Report']['serial_no'])) {
                        echo $report_datas['Report']['serial_no'];
                    } else {
                        echo "00";
                    }
                        ?></td>
                        <td><?php
                    if (!empty($report_datas['Report']['icode_period'])) {
                        echo $report_datas['Report']['icode_period'];
                    } else {
                        echo "00";
                    }
                        ?></td>
                        <td><?php
                    if (!empty($report_datas['Report']['days'])) {
                        echo $report_datas['Report']['days'];
                    } else {
                        echo "00";
                    }
                        ?></td>
                        <td><?php
                    if (!empty($report_datas['Report']['minutes'])) {
                        echo $report_datas['Report']['minutes'];
                    } else {
                        echo "00";
                    }
                        ?></td>
                        <td><?php
                    if (!empty($report_datas['Report']['avg_pressure'])) {
                        echo $report_datas['Report']['avg_pressure'];
                    } else {
                        echo"00";
                    }
                        ?></td>
                        <td><?php
                    if (!empty($report_datas['Report']['p95'])) {
                        echo $report_datas['Report']['p95'];
                    } else {
                        echo "00";
                    }
                        ?></td>
                        <td><?php
                    if (!empty($report_datas['Report']['best30'])) {
                        echo $report_datas['Report']['best30'];
                    } else {
                        echo "00";
                    }
                        ?></td>
                        <td><?php
                    if (!empty($report_datas['Report']['ahi'])) {
                        echo $report_datas['Report']['ahi'];
                    } else {
                        echo "00";
                    }
                        ?></td>
                        <td><?php
                    if (!empty($report_datas['Report']['sni'])) {
                        echo $report_datas['Report']['sni'];
                    } else {
                        echo "00";
                    }
                        ?></td>
                         <td><?php
                    if (!empty($report_datas['Report']['percentage'])) {
                        echo $report_datas['Report']['percentage']."%";
                    } else {
                        echo "00%";
                    }
                        ?></td>
                        <td><?php
                    if (!empty($report_datas['Report']['created_date'])) {
                        echo $report_datas['Report']['created_date'];
                    } else {
                        echo "00";
                    }
                        ?></td>
                    <?php } ?>
                </tr>
            </table><br /><br /> 
        </div>
        <h3 align="left">Report Graphs</h3>
        <?php
        echo $this->Html->script('jquery.min');
        echo $this->Html->script('exporting');
        $icode_period = array();
        $hours = array();
        $percentage = array();
        $ahi = array();
        $pressure = array();
        $created_date = array();
        foreach ($report_data as $values) {
            $day[] = $values['Report']['icode_period'];
            $hours[] = round(($values['Report']['minutes']) / 60);
            $percentage[] = $values['Report']['percentage'];
            $ahi[] = $values['Report']['ahi'];
            $pressure[] = $values['Report']['avg_pressure'];
            $created_date[] = $values['Report']['created_date'];
        }
        $chart_days = implode(',', $day);
        $round_hours = round($hours, 2);
        $chart_hours = implode(',', $hours);
        $chart_percentage = implode(',', $percentage);
        $chart_ahi = implode(',', $ahi);
        $chart_best30 = implode(',', $pressure);
        $chart_created_date = implode(',', $created_date);
        ?>
        <div id="container1" class="graph1"></div>
        <div id="container2" class="graph2"></div>
        <div id="container3" class="graph3"></div>
        <div id="container4" class="graph4"></div>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script>
            $(function () {
                var div1 = '#container1';
                var avg='Average p95';
                var pressure='pressure';
                var div2 = '#container2';
                var val='%';
                var day='Days Of Therapy(%)';
                var div3 = '#container3';
                var index= 'Apnea-Hypopnea Index';
                var ahi='Average_AHI';
                var div4 = '#container4';
                var daily='Average Daily Compliance';
                var Hours='Hours(approx)';
                           
                var chart_days=new Array();
                var chart_days=['365','182','90','30','7','1'];
                var days=chart_days.indexOf('<?php echo $chart_days; ?>');   
                if(div1== '#container1')
                {
                            
                    var chart_best30=new Array();
                    var i=0;
                    while(i<6)
                    {
                        if(days==i){
                            chart_best30.push(<?php echo $chart_best30; ?>);
                        }else{
                            chart_best30.push('0');
                        } 
                        i++;
                             
                    }
                    graph(div1,chart_days,chart_best30,avg,pressure);
                }
                            
                if(div2=='#container2')
                {
                    var chart_percentage=new Array();
                    var i=0;
                    while(i<6)
                    {
                        if(days==i){
                            chart_percentage.push(<?php echo $chart_percentage; ?>);
                        }else{
                            chart_percentage.push('0');
                        } 
                        i++;
                    }
                    graph(div2,chart_days,chart_percentage,day,val);
                }
                          
                if(div3=='#container3')
                {
                    var chart_ahi=new Array();
                    var i=0;
                    while(i<6)
                    {
                        if(days==i){
                            chart_ahi.push(<?php echo $chart_ahi; ?>);
                        }else{
                            chart_ahi.push('0');
                        }
                        i++;
                    }
                    graph(div3,chart_days,chart_ahi,index,ahi);
                }
                           
                if(div4=='#container4')
                {
                    var chart_hours=new Array();
                    var i=0;
                    while(i<6)
                    {
                        if(days==i){
                            chart_hours.push(<?php echo $chart_hours; ?>)
                        }else{
                            chart_hours.push('0');
                        }
                        i++;
                    }
                    graph(div4,chart_days,chart_hours,daily,Hours);
                }
                function graph(div,values,chart_days,yaxces,xaxces) {
                    $(div).highcharts({
                        chart: {
                            type: 'bar'
                        },
                        title: {
                            text: null
                        },
                        subtitle: {
                            text:null
                        },
                        xAxis: {
                            categories: values,
                            tickmarkPlacement: 'on',
                            title: {
                                text:null
                            }
                        },
                        yAxis: {
                            title: {
                                text:yaxces
                                          
                            },
                            labels: {
                                overflow: 'justify'
                            }
                        },
                        plotOptions: {
                            bar: {
                                dataLabels: {
                                    enabled: true
                                }
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                          //  x: -100,
                          //  y: 100,
                            floating: true,
                            borderWidth: 1,
                            backgroundColor: '#FFFFFF',
                            shadow: true
                        },
                        credits: {
                            enabled: false
                        },
                        series: [{
                                name: ['<?php echo $chart_created_date; ?>'],
                                data: chart_days
                            }]
                    });
                }
            });  
        </script>
        <?
    } else {
        echo"Sorry you can't see this report.";
    }
    ?>
</div>