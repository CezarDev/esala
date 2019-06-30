<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<h2> tem isso</h2>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

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
            data: [{{$qtdMecanica}},7,2,8,9,25,8,33,19,7,1,40]
        },
        {
            label: 'Informática',
            backgroundColor: 'green',
            borderColor: 'rgb(0, 255, 255)',
            data: [9, 40, 5, 12, 20, 30, 45,7,2,8,5,7]
        },
        {
            label: 'Eletrotécnica',
            backgroundColor: 'orange',
            borderColor: 'rgb(0, 204, 0)',
            data: [1, 10, 5, 22, 15, 25, 40,5,25,3,39,8]
        },
        {
            label: 'Sistemas para Internet',
            backgroundColor: 'red',
            borderColor: 'rgb(60, 59, 10)',
            data: [8, 10, 4, 8, 17, 38, 35,17,5,26,36,2]    

        }]


    },

    // Configuration options go here
    options: {}
});

</script>