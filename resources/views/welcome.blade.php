<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{env('APP_NAME')}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link  href="{{ asset('backend/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container" syle="height:100%;">
        <div class="col-md-10 offset-1">
            <div class="row">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">
                        <h4>Incoming Messages Summary</h4>
                    </div>
                    <div class="panel-body mt-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="myChart" height="300"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="myChart-pie"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <canvas id="myChart-doughnut"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <a class="btn btn-primary" href="/admin"> <i class="fa fa-cogs"></i> View Admin Dashboard</a>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
        </script>
        <script>
            const labels = [
                'Valid',
                'Invalid',
                'Other'
            ];

            /* async function fetchData1JSON() {
                const response = await fetch(`https://steveowago.me/includes/data.json`);
                const data1 = await response.json();
                return data1;
            }

            fetchData1JSON().then(data1 => {
                console.log(data1)
            }); */

            const statusValid = {{ count($statusValid) }}

            const statusInvalid = {{ count($statusInvalid) }}

            const statusOther = {{ count($statusOther) }}

            const setBg = () => {
                const randomColor ="#" + Math.floor(Math.random() * 16777215).toString(16);
                return randomColor
            }


            const data = {
                labels: labels,
                datasets: [{
                    label: 'Dundasprints - Incoming messages summary',
                    backgroundColor: [setBg(), setBg(), setBg()],
                   // borderColor: ['rgb(106, 255, 51)', 'rgb(255,66,51)', 'rgb(255, 189, 51 )'],
                    data: [statusValid, statusInvalid, statusOther],
                }]
            };

            const config = {
                type: 'bar',
                data: data,
                options: {}
            };
            const configDoughnut = {
                type: 'doughnut',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            };
            const configPie = {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            };

            const myChart = new Chart(
                document.getElementById('myChart'),
                config
            );
            const myChartPie = new Chart(
                document.getElementById('myChart-pie'),
                configPie
            );
            const myChartDoughnut = new Chart(
                document.getElementById('myChart-doughnut'),
                configDoughnut
            );
        </script>
</body>

</html>
