<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="col_md_12">
                <div class="panel panel-success">
                <div class="panel-heading text-center"><h4>Incoming Messages Summary</h4></div>
                <div class="panel-body">
                    <canvas id="myChart" width="500" height="400"></canvas>
                </div>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script>
        const labels = [
            'Valid',
            'Invalid',
        ];
        
        async function fetchData1JSON() {
          const response = await fetch(`https://steveowago.me/includes/data.json`);
          const data1 = await response.json();
          return data1;
        }

        fetchData1JSON().then(data1 => {
          console.log(data1)
        });

        const data = {
            labels: labels,
            datasets: [{
            label: 'Dundasprints - Incoming messages summary',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [30, 45],
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {}
        };
    
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
    </script>
    </body>
</html>
