@extends('layout.main')

@section('container')
    @include('partials.navbar')

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <section class="flex h-screen w-screen items-center justify-center p-12" id="signIn">

        <div class="z-[-1] mt-32 flex h-full w-full flex-col items-start justify-between">
            <div class="flex w-full gap-4">
                <!-- Jumlah Perusahaan Berdasarkan Provinsi -->
                <div class="mb-8 h-[55vh] w-[55vw] rounded-md bg-white p-5 shadow-lg shadow-secondary">
                    <h1 class="text-base font-semibold sm:text-sm md:text-base lg:text-lg">Jumlah Perusahaan Berdasarkan
                        Provinsi</h1>
                    <div class='tableauPlaceholder z-50' id='viz1726081106585' style='position: relative'><noscript><a
                                href='#'><img alt='Dashboard 2'
                                    src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Ju&#47;JumlahPerusahaanBerdasarkanProvinsi&#47;Dashboard2&#47;1_rss.png'
                                    style='border: none' /></a></noscript><object class='tableauViz' style='display:none;'>
                            <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' />
                            <param name='embed_code_version' value='3' />
                            <param name='site_root' value='' />
                            <param name='name' value='JumlahPerusahaanBerdasarkanProvinsi&#47;Dashboard2' />
                            <param name='tabs' value='yes' />
                            <param name='toolbar' value='yes' />
                            <param name='static_image'
                                value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;Ju&#47;JumlahPerusahaanBerdasarkanProvinsi&#47;Dashboard2&#47;1.png' />
                            <param name='animate_transition' value='yes' />
                            <param name='display_static_image' value='yes' />
                            <param name='display_spinner' value='yes' />
                            <param name='display_overlay' value='yes' />
                            <param name='display_count' value='yes' />
                            <param name='language' value='en-GB' />
                            <param name='filter' value='publish=yes' />
                        </object></div>
                    <script type='text/javascript'>
                        var divElement = document.getElementById('viz1726081106585');
                        var vizElement = divElement.getElementsByTagName('object')[0];
                        if (divElement.offsetWidth > 800) {
                            vizElement.style.width = '900px';
                            vizElement.style.height = '475px';
                        } else if (divElement.offsetWidth > 500) {
                            vizElement.style.width = '1000px';
                            vizElement.style.height = '827px';
                        } else {
                            vizElement.style.width = '100%';
                            vizElement.style.height = '727px';
                        }
                        var scriptElement = document.createElement('script');
                        scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
                        vizElement.parentNode.insertBefore(scriptElement, vizElement);
                    </script>
                </div>
                <div class="flex h-[55vh] w-[45vw] flex-col">
                    <div class="mb-4 flex h-1/2 w-full">
                        <div class="mr-4 h-full w-1/2 rounded-md bg-white p-5 shadow-lg shadow-secondary">
                            <h1 class="text-base font-semibold sm:text-sm md:text-base lg:text-lg">Total Perusahaan Industri
                                (Kecil dan Mikro) - Indonesia
                            </h1>
                            <p class="text-bolder text-center text-xl">2022</p>
                            <p>{{ $total2022 }}</p>
                            <p>{{ number_format($persentasePerubahan, 2) }}%</p>
                        </div>
                        <div class="ml-4 h-full w-1/2 rounded-md bg-white p-5 shadow-lg shadow-secondary">

                        </div>
                    </div>
                    <div class="mt-4 flex h-1/2 w-full">
                        <div class="mr-4 h-full w-1/2 rounded-md bg-white p-5 shadow-lg shadow-secondary">
                            <h1 class="text-base font-semibold sm:text-sm md:text-base lg:text-lg">Total Nilai Output -
                                Indonesia</h1>
                        </div>
                        <div class="ml-4 h-full w-1/2 rounded-md bg-white p-5 shadow-lg shadow-secondary">
                            <h1 class="text-base font-semibold sm:text-sm md:text-base lg:text-lg">Total Nilai Tambah
                                Industri
                                - Indonesia</h1>
                            <p class="text-"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex w-full gap-4">
                <!-- Stacked Bar Chart - Jumlah Perusahaan Berdasarkan Sektor dan Tahun -->
                <div class="col-span-3 h-[40vh] w-[55vw] rounded-md bg-white p-4 shadow-lg shadow-secondary">
                    <h1 class="mb-3 text-base font-semibold">Top 5 Jumlah Perusahaan Berdasarkan Sektor dan Tahun</h1>
                    <div class="h-[80%] w-full" id="stacked-bar-chart"></div>
                    <script>
                        var categories = @json($categories); // Tahun
                        var formattedData = @json($formattedData); // Data formatted dari controller

                        // Siapkan series data untuk chart
                        var seriesData = [];
                        Object.keys(formattedData).forEach(function(sektor) {
                            var dataSeries = [];
                            categories.forEach(function(tahun) {
                                dataSeries.push(formattedData[sektor][tahun] || 0); // Isi 0 jika tidak ada data
                            });
                            seriesData.push({
                                name: sektor,
                                data: dataSeries
                            });
                        });

                        var stackedBarOptions = {
                            chart: {
                                type: 'bar',
                                stacked: true,
                                width: '100%',
                                height: 290,
                                toolbar: {
                                    show: true,
                                    tools: {
                                        download: true,
                                        selection: true,
                                        zoom: true,
                                        zoomin: true,
                                        zoomout: true,
                                        pan: true,
                                        reset: true,
                                        customIcons: []
                                    }
                                }
                            },
                            series: seriesData,
                            xaxis: {
                                categories: categories,
                                title: {
                                    text: 'Tahun'
                                }
                            },
                            yaxis: {
                                title: {
                                    text: 'Jumlah Perusahaan'
                                }
                            },
                            colors: [
                                '#D3D3D3',
                                '#A9B5C9',
                                '#819EB9',
                                '#4B6A9B',
                                '#2D3945',
                            ],
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '55%',
                                    endingShape: 'rounded'
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }

                        var stackedBarChart = new ApexCharts(document.querySelector("#stacked-bar-chart"), stackedBarOptions);
                        stackedBarChart.render();
                    </script>
                </div>

                <!-- Nilai Tambah Industri Berdasarkan Provinsi dan Sektor Industri Chart -->
                <div class="h-[40vh] w-full rounded-md bg-white p-5 shadow-lg shadow-secondary">
                    <div class="mb-5 h-auto w-full">
                        <h1 class="text-base font-semibold sm:text-sm md:text-base lg:text-lg">
                            Top 5 Nilai Tambah Industri Berdasarkan Sektor Industri dan Skala Industri
                        </h1>
                    </div>
                    <div class="h-auto w-full" id="clustered-bar-chart"></div>

                    <script>
                        var categories = @json($categories2);
                        var formattedData = @json($formattedData2);

                        var seriesData = [];
                        Object.keys(formattedData).forEach(function(sektor) {
                            var dataSeries = [];
                            categories.forEach(function(skala) {
                                dataSeries.push(formattedData[sektor][skala] || 0);
                            });
                            seriesData.push({
                                name: sektor,
                                data: dataSeries
                            });
                        });

                        var clusteredBarOptions = {
                            chart: {
                                type: 'bar',
                                width: '100%',
                                height: 290,
                                stacked: false,
                                toolbar: {
                                    show: true,
                                    tools: {
                                        download: true,
                                        selection: true,
                                        zoom: true,
                                        zoomin: true,
                                        zoomout: true,
                                        pan: true,
                                        reset: true,
                                        customIcons: []
                                    }
                                }
                            },
                            series: seriesData,
                            xaxis: {
                                categories: categories,
                                title: {
                                    text: 'Tahun'
                                }
                            },
                            yaxis: {
                                title: {
                                    text: 'Nilai Tambah Industri'
                                }
                            },
                            colors: [
                                '#2D3945',
                                '#4B6A9B',
                                '#819EB9',
                                '#A9B5C9',
                                '#D3D3D3',
                            ],
                            legend: {
                                position: 'bottom'
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '40%',
                                    endingShape: 'rounded'
                                }
                            },
                            dataLabels: {
                                enabled: false
                            },
                            grid: {
                                padding: {
                                    top: 0,
                                    right: 0,
                                    bottom: 0,
                                    left: 0
                                }
                            }
                        };

                        var clusteredBarChart = new ApexCharts(document.querySelector("#clustered-bar-chart"), clusteredBarOptions);
                        clusteredBarChart.render();
                    </script>
                </div>

            </div>

            <div class="mt-5 flex w-full gap-4">
                <!-- Jumlah Perusahaan Berdasarkan Skala Industri Chart -->
                <div class="h-[45vh] w-4/12 rounded-md bg-white p-5 shadow-lg shadow-secondary">
                    <div class="mb-5 h-auto w-full">
                        <h1 class="text-base font-semibold sm:text-sm md:text-base lg:text-lg">Jumlah Perusahaan Berdasarkan
                            Skala Industri</h1>
                    </div>
                    <div class="h-auto w-full" id="donut-chart"></div>

                    <script>
                        // Data dari controller
                        var seriesData = @json($seriesData); // Jumlah perusahaan per skala
                        var labels = @json($labels); // Nama skala industri

                        var donutOptions = {
                            chart: {
                                type: 'donut',
                                width: '100%',
                                height: 350,
                                toolbar: {
                                    show: true
                                }
                            },
                            series: seriesData, // Data jumlah perusahaan
                            labels: labels, // Nama skala industri
                            colors: [
                                '#4B6A9B',
                                '#2D3945',
                                '#819EB9',
                                '#A9B5C9',
                                '#D3D3D3',
                            ],
                            dataLabels: {
                                enabled: true
                            },
                            legend: {
                                position: 'bottom'
                            }
                        }

                        var donutChart = new ApexCharts(document.querySelector("#donut-chart"), donutOptions);

                        donutChart.render();
                    </script>
                </div>

                <!-- Nilai Output Berdasarkan Sektor Industri Chart -->
                <div class="h-[45vh] w-9/12 rounded-md bg-white p-5 shadow-lg shadow-secondary">
                    <div class="mb-5 h-auto w-full">
                        <h1 class="text-base font-semibold sm:text-sm md:text-base lg:text-lg">Top 5 Nilai Output
                            Berdasarkan Sektor Industri</h1>
                    </div>
                    <div class="h-auto w-full" id="horizontal-bar-chart"></div>

                    <script>
                        // Data dari controller
                        var categories5 = @json($categories5); // Nama sektor industri
                        var outputValues = @json($outputValues); // Nilai output untuk masing-masing sektor

                        var barOptions = {
                            chart: {
                                type: 'bar',
                                width: '100%',
                                height: 275,
                                toolbar: {
                                    show: true
                                }
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: true,
                                    barHeight: '70%',
                                    dataLabels: {
                                        position: 'top'
                                    }
                                }
                            },
                            series: [{
                                name: 'Nilai Output',
                                data: outputValues, // Nilai output untuk top 5 sektor
                                color: function({
                                    value,
                                    seriesIndex,
                                    dataPointIndex,
                                    w
                                }) {
                                    var colors = ['#2D3945', '#4B6A9B', '#819EB9', '#A9B5C9', '#D3D3D3'];
                                    return colors[dataPointIndex % colors.length];
                                }
                            }],
                            xaxis: {
                                categories: categories5, // Nama sektor industri
                                title: {
                                    text: 'Nilai Output'
                                }
                            },
                            yaxis: {
                                title: {
                                    text: 'Sektor Industri'
                                }
                            },
                            dataLabels: {
                                enabled: true,
                                formatter: function(val) {
                                    return val;
                                },
                                offsetX: 10,
                                style: {
                                    fontSize: '12px',
                                    colors: ['#000']
                                }
                            },
                            grid: {
                                padding: {
                                    top: 0,
                                    right: 0,
                                    bottom: 0,
                                    left: 0
                                }
                            },
                            legend: {
                                show: false
                            }
                        };

                        var horizontalBarChart = new ApexCharts(document.querySelector("#horizontal-bar-chart"), barOptions);
                        horizontalBarChart.render();
                    </script>
                </div>

            </div>

            <div class="mb-10 mt-5 flex w-full gap-4">
                <!-- Perbandingan Total Nilai Output Berdasarkan Skala -->
                <div class="h-[45vh] w-3/12 rounded-md bg-white p-5 shadow-lg shadow-secondary">
                    <h1 class="text-md mbbase font-semibold">Perbandingan Total Nilai Output Berdasarkan Skala</h1>
                    <div class="h-[80%] w-full" id="grouped-bar-chart"></div>

                    <script>
                        // Data dari controller
                        var categories4 = @json($categories4);
                        var seriesData4 = @json($seriesData4);

                        var groupedBarOptions = {
                            chart: {
                                type: 'bar',
                                width: '100%',
                                height: 290,
                                stacked: false,
                                toolbar: {
                                    show: true,
                                    tools: {
                                        download: true,
                                        selection: true,
                                        zoom: true,
                                        zoomin: true,
                                        zoomout: true,
                                        pan: true,
                                        reset: true,
                                        customIcons: []
                                    }
                                }
                            },
                            series: seriesData4,
                            xaxis: {
                                categories: categories4,
                                title: {
                                    text: 'Skala Industri'
                                }
                            },
                            yaxis: {
                                title: {
                                    text: 'Total Nilai Output'
                                }
                            },
                            plotOptions: {
                                bar: {
                                    horizontal: false,
                                    columnWidth: '40%',
                                    endingShape: 'rounded'
                                }
                            },
                            colors: [
                                '#4B6A9B', // Warna untuk bar Mikro
                                '#2D3945', // Warna untuk bar Kecil
                            ],
                            dataLabels: {
                                enabled: true
                            },
                            legend: {
                                position: 'top'
                            }
                        };

                        var groupedBarChart = new ApexCharts(document.querySelector("#grouped-bar-chart"), groupedBarOptions);
                        groupedBarChart.render();
                    </script>
                </div>

                <!-- Pertumbuhan Produksi Berdasarkan Tahun Chart -->
                <div class="h-[45vh] w-9/12 rounded-md bg-white p-5 shadow-lg shadow-secondary">
                    <div class="mb-5 h-auto w-full">
                        <h1 class="text-base font-semibold sm:text-sm md:text-base lg:text-lg">Pertumbuhan Produksi
                            DKI Jakarta, Bali, dan Jawa Timur Berdasarkan Tahun</h1>
                    </div>
                    <div class="h-auto w-full" id="area-chart"></div>

                    <script>
                        // Data dari controller
                        var seriesData2 = @json($seriesData2);
                        var categories3 = @json($categories3);

                        var areaChartOptions = {
                            chart: {
                                type: 'area',
                                height: 275,
                                width: '100%',
                                toolbar: {
                                    show: true
                                }
                            },
                            series: seriesData2,
                            xaxis: {
                                categories: categories3,
                                title: {
                                    text: 'Tahun'
                                }
                            },
                            yaxis: {
                                title: {
                                    text: 'Persentase Pertumbuhan Produksi'
                                }
                            },
                            colors: [
                                '#2D3945',
                                '#4B6A9B',
                                '#819EB9',
                                '#A9B5C9',
                                '#D3D3D3',
                            ],
                            dataLabels: {
                                enabled: false
                            },
                            stroke: {
                                curve: 'smooth'
                            },
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.7,
                                    opacityTo: 0.9,
                                    stops: [0, 90, 100]
                                }
                            },
                            legend: {
                                position: 'top',
                                horizontalAlign: 'center'
                            },
                            tooltip: {
                                shared: true,
                                intersect: false
                            },
                            grid: {
                                padding: {
                                    left: 0,
                                    right: 0,
                                    bottom: 0,
                                    top: 0
                                }
                            }
                        };

                        var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);

                        areaChart.render();
                    </script>
                </div>

            </div>
        </div>
    </section>
@endsection
