@extends('layouts.app')

@section('title', 'Dashboard')

@section('js')
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
@endsection

@section('content')
<div class="card mb-4">
    <h6 class="text-center mt-3">Grafik Jumlah Pengguna yang Mendaftar per Bulan</h6>
    <div class="chart-container mb-4">
        {!! $chart->container() !!}
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var chart = {!! $chart->script() !!};
        if (chart && chart.options && chart.options.scales) {
            chart.options.scales.yAxes = [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 1,
                    max: {{ $chart->options['scales']['yAxes'][0]['ticks']['max'] ?? 9 }}, // Adjust this to your chart's max value
                    callback: function(value) {
                        return Number.isInteger(value) ? value : ''; 
                    }
                }
            }];
            chart.update();
        }
    });
</script>
@endsection
