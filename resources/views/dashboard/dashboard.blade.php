@extends('layout.main')

@section('title', 'Dashboard')
@section('content')
    <div class="w-full mb-4">
        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl">Summary</h1>
    </div>
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 mb-4">
        <div class="grid gap-4 sm:grid-cols-1 md:grid-cols-2 xl:grid-cols-3 p-4">
            <div>
                <p class="text-primary font-bold text-2xl ">Rp {{ number_format($balance, 0, ',', '.') }}</p>
                <p class="text- text-sm mt-1">Jumlah saldo</p>
            </div>
            <div>
                <p class="text-primary font-bold text-2xl ">Rp {{ number_format($monthly, 0, ',', '.') }}</p>
                <p class="text- text-sm mt-1">Jajan Bulan November</p>
            </div>
            <div>
                <p class="text-primary font-bold text-2xl ">{{ $jajan }}</p>
                <p class="text- text-sm mt-1">Kali Dijajanin</p>
            </div>
        </div>
    </div>
    <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2">
        <div class="flex items-center justify-center mb-4">
            <span class="text-lg font-medium leading-none text-gray-900">Support in 30 days</span>
        </div>
        <div id="chart-overview"></div>
    </div>
@endsection

@section('script')
    <script>
        const options = {
            series: [{
                name: 'Revenue',
                color: '#1A56DB',
                data: <?= $chart ?>
            }],
            chart: {
                type: 'line',
                height: '300px',
                fontFamily: 'Inter, sans-serif',
                foreColor: '#6B7280',
                toolbar: {
                    show: false
                }
            },
            tooltip: {
                shared: true,
                intersect: false,
                style: {
                    fontSize: '14px',
                    fontFamily: 'Inter, sans-serif'
                },
            },
            states: {
                hover: {
                    filter: {
                        type: 'darken',
                        value: 1
                    }
                }
            },
            stroke: {
                show: true,
                width: 5,
                colors: ['transparent']
            },
            grid: {
                show: false
            },
            xaxis: {
                floating: false,
            },
            yaxis: {
                labels: {
                    formatter: function(value) {
                        return "Rp" + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                    }
                },
            },
            fill: {
                opacity: 1
            }
        };

        const chart = new ApexCharts(document.getElementById('chart-overview'), options);
        chart.render();
    </script>
@endsection
