<!DOCTYPE html>
<html>
<head>
    <title>eSALA</title>
</head>
<body>

<a href="{{url('/admin')}}" class="btn btn-secondary" align="right">Voltar</a>
</body>
</html>
<style>
    .btn{
        float: right;
    margin-top: 15px;
    margin-right: 9px;
    }

</style>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<canvas id="myChart"></canvas>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto','Setembro','Outubro','Novembro','Dezembro'],
        datasets: [{
            label: 'Mecanica',
            backgroundColor: 'blue',
            borderColor: 'rgb(255, 99, 132)',
            data: [0,0,0,0,0,{{$qtdMecanica}},0,0,0,0,0]
        },
        {
            label: 'Informática',
            backgroundColor: 'green',
            borderColor: 'rgb(0, 255, 255)',
            data: [0,0,0,0,0,{{$qtdInfo}},0,0,0,0,0]
        },
        {
            label: 'Eletrotécnica',
            backgroundColor: 'orange',
            borderColor: 'rgb(0, 204, 0)',
            data: [0,0,0,0,0,{{$qtdEletro}},0,0,0,0,0]
        },
        {
            label: 'Sistemas para Internet',
            backgroundColor: 'red',
            borderColor: 'rgb(60, 59, 10)',
            data: [0,0,0,0,0,{{$qtdSis}},0,0,0,0,0]    

        }]


    },

    // Configuration options go here
    options: {}
});

</script>