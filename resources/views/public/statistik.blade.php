@extends('layouts.public')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-bold text-primary">Statistik Desa Rejosari</h2>
            <p class="text-muted">Data kependudukan dan layanan administrasi terkini</p>
        </div>
    </div>

    {{-- Section 1: Summary Cards --}}
    <div class="row mb-5">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2 text-primary">
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                    <h5 class="card-title text-muted mb-0">Total Penduduk</h5>
                    <h2 class="fw-bold">{{ number_format($total_penduduk) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2 text-info">
                        <i class="fas fa-male fa-2x"></i>
                    </div>
                    <h5 class="card-title text-muted mb-0">Laki-laki</h5>
                    <h2 class="fw-bold">{{ number_format($total_laki) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2 text-danger">
                        <i class="fas fa-female fa-2x"></i>
                    </div>
                    <h5 class="card-title text-muted mb-0">Perempuan</h5>
                    <h2 class="fw-bold">{{ number_format($total_perempuan) }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body text-center">
                    <div class="mb-2 text-success">
                        <i class="fas fa-home fa-2x"></i>
                    </div>
                    <h5 class="card-title text-muted mb-0">Total KK</h5>
                    <h2 class="fw-bold">{{ number_format($total_kk) }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Section 2: Charts Row 1 --}}
    <div class="row mb-5">
        {{-- Population Pyramid --}}
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold">Piramida Penduduk</h5>
                </div>
                <div class="card-body">
                    <div id="chart-pyramid"></div>
                </div>
            </div>
        </div>
        {{-- Letter Requests Pie Chart --}}
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold">Layanan Administrasi</h5>
                </div>
                <div class="card-body d-flex align-items-center justify-content-center">
                    <div id="chart-surat" class="w-100"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Section 3: Charts Row 2 --}}
    <div class="row">
        {{-- Education Stats --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold">Statistik Pendidikan</h5>
                </div>
                <div class="card-body">
                    <div id="chart-pendidikan"></div>
                </div>
            </div>
        </div>
        {{-- Job Stats --}}
        <div class="col-lg-6 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0 fw-bold">Statistik Pekerjaan (Top 10)</h5>
                </div>
                <div class="card-body">
                    <div id="chart-pekerjaan"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Hidden Data Container --}}
    <div id="statistik-data"
         data-penduduk-usia="{{ json_encode($penduduk_usia) }}"
         data-surat-stats="{{ json_encode(['series' => $surat_stats->pluck('total'), 'labels' => $surat_stats->pluck('label')]) }}"
         data-pendidikan-stats="{{ json_encode(['series' => $pendidikan_stats->pluck('total'), 'categories' => $pendidikan_stats->pluck('pendidikan')]) }}"
         data-pekerjaan-stats="{{ json_encode(['series' => $pekerjaan_stats->pluck('total'), 'categories' => $pekerjaan_stats->pluck('pekerjaan')]) }}"
         data-max-age-pop="{{ $max_age_pop }}"
         style="display: none;">
    </div>
</div>

{{-- ApexCharts Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        
        // 1. Retrieve Data from HTML Attributes
        const dataEl = document.getElementById('statistik-data');
        
        const pendudukUsia = JSON.parse(dataEl.dataset.pendudukUsia);
        const suratStats = JSON.parse(dataEl.dataset.suratStats);
        const pendidikanStats = JSON.parse(dataEl.dataset.pendidikanStats);
        const pekerjaanStats = JSON.parse(dataEl.dataset.pekerjaanStats);
        const maxAgePop = parseFloat(dataEl.dataset.maxAgePop);

        // 2. Prepare Variables
        const pyramidMale = pendudukUsia.male;
        const pyramidFemale = pendudukUsia.female;
        const pyramidCategories = pendudukUsia.categories;

        const suratSeries = suratStats.series;
        const suratLabels = suratStats.labels;

        const pendidikanSeries = pendidikanStats.series;
        const pendidikanCategories = pendidikanStats.categories;

        const pekerjaanSeries = pekerjaanStats.series;
        const pekerjaanCategories = pekerjaanStats.categories;

        // 3. Pyramid Chart Configuration
        var optionsPyramid = {
            series: [{
                name: 'Laki-laki',
                data: pyramidMale
            }, {
                name: 'Perempuan',
                data: pyramidFemale.map(val => -val)
            }],
            chart: {
                type: 'bar',
                height: 350,
                stacked: true,
                toolbar: { show: false }
            },
            colors: ['#2c3e50', '#e91e63'],
            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '80%',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                width: 1,
                colors: ["#fff"]
            },
            grid: {
                xaxis: {
                    lines: { show: false }
                }
            },
            yaxis: {
                min: -maxAgePop,
                max: maxAgePop,
                title: {
                    // text: 'Age',
                },
            },
            tooltip: {
                shared: false,
                x: {
                    formatter: function (val) {
                        return val
                    }
                },
                y: {
                    formatter: function (val) {
                        return Math.abs(val)
                    }
                }
            },
            title: {
                text: 'Berdasarkan Rentang Usia',
                align: 'center'
            },
            xaxis: {
                categories: pyramidCategories,
                title: {
                    text: 'Jumlah Penduduk'
                },
                labels: {
                    formatter: function (val) {
                        return Math.abs(Math.round(val))
                    }
                }
            },
        };

        var chartPyramid = new ApexCharts(document.querySelector("#chart-pyramid"), optionsPyramid);
        chartPyramid.render();


        // 4. Pie Chart Configuration
        var optionsSurat = {
            series: suratSeries,
            chart: {
                width: '100%',
                type: 'pie',
            },
            labels: suratLabels,
            theme: {
                monochrome: {
                    enabled: true,
                    color: '#008FFB', // Blue theme
                    shadeTo: 'light',
                    shadeIntensity: 0.65
                }
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        offset: -5
                    }
                }
            },
            title: {
                text: 'Permohonan Surat',
                align: 'center'
            },
            dataLabels: {
                formatter(val, opts) {
                    const name = opts.w.globals.labels[opts.seriesIndex]
                    return [name, val.toFixed(1) + '%']
                }
            },
            legend: {
                show: false
            }
        };

        var chartSurat = new ApexCharts(document.querySelector("#chart-surat"), optionsSurat);
        chartSurat.render();


        // 5. Bar Chart (Pendidikan)
        var optionsPendidikan = {
            series: [{
                name: 'Jumlah',
                data: pendidikanSeries
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: pendidikanCategories,
            },
            colors: ['#435ebe']
        };

        var chartPendidikan = new ApexCharts(document.querySelector("#chart-pendidikan"), optionsPendidikan);
        chartPendidikan.render();


        // 6. Bar Chart (Pekerjaan)
        var optionsPekerjaan = {
            series: [{
                name: 'Jumlah',
                data: pekerjaanSeries
            }],
            chart: {
                type: 'bar',
                height: 350,
                toolbar: { show: false }
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: pekerjaanCategories,
            },
            colors: ['#57caeb']
        };

        var chartPekerjaan = new ApexCharts(document.querySelector("#chart-pekerjaan"), optionsPekerjaan);
        chartPekerjaan.render();

    });
</script>
@endsection
