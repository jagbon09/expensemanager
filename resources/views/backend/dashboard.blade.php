@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">&nbsp;</h3>

            <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
        </div>
        </div>
        <div class="box-body">
        <div id="chartPie" style="height: 350px;"></div>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@section('after-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/4.1.0/echarts.min.js"></script>
<script>
    $(function(){
        'use strict'

        var pieData = [{
        name: 'Expense',
        type: 'pie',
        radius: '80%',
        center: ['50%', '57.5%'],
        data: <?php echo json_encode($Data); ?>,
        label: {
          normal: {
            fontFamily: 'Roboto, sans-serif',
            fontSize: 11
          }
        },
        labelLine: {
          normal: {
            show: false
          }
        },
        markLine: {
          lineStyle: {
            normal: {
              width: 1
            }
          }
        }
        }];
        var pieOption = {
        tooltip: {
          trigger: 'item',
          formatter: '{a} <br/>{b}: {c} ({d}%)',
          textStyle: {
            fontSize: 11,
            fontFamily: 'Roboto, sans-serif'
          }
        },
        legend: {},
        series: pieData
        };
        var pie = document.getElementById('chartPie');
        var pieChart = echarts.init(pie);
        pieChart.setOption(pieOption);
    });
</script>
@endsection