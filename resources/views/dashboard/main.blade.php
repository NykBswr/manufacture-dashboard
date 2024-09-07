@extends('layout.main')

@section('container')
    @include('partials.navbar')

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <section class="flex h-screen w-screen items-center justify-center p-12" id="signIn">
        <div class="z-[-1] mt-24 flex h-full w-full flex-col items-start justify-between">
            <div class="h-[45vh] w-4/12 rounded-md bg-white p-5 shadow-lg shadow-secondary">
                <div class="mb-5 h-auto w-full">
                    <h1 class="text-xs font-semibold sm:text-sm md:text-base lg:text-lg">X</h1>
                </div>
                <div class="h-auto w-full" id="chart">
                </div>
                <script>
                    var options = {
                        chart: {
                            type: 'line'
                        },
                        series: [{
                            name: 'sales',
                            data: [30, 40, 35, 50, 49, 60, 70, 91, 125]
                        }],
                        xaxis: {
                            categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998, 1999]
                        }
                    }

                    var chart = new ApexCharts(document.querySelector("#chart"), options);

                    chart.render();
                </script>
            </div>
        </div>
    </section>
@endsection
