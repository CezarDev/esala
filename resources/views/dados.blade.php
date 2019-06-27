
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<canvas id="myChart"></canvas>

<script>
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho'],
        datasets: [{
            label: 'Mecanica',
            backgroundColor: 'rgb(200, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: [{{$qtdMecanica}},0,0,0,0,0,0]
        },
        {
            label: 'Informática',
            backgroundColor: 'rgb(28, 79, 12)',
            borderColor: 'rgb(20, 9, 12)',
            data: [0, 10, 5, 2, 20, 30, 45]
        },
        {
            label: 'Eletrotécnica',
            backgroundColor: 'rgb(28, 209, 52)',
            borderColor: 'rgb(2, 9, 55)',
            data: [0, 10, 5, 2, 20, 30, 45]
        },
        {
            label: 'Sistemas para Internet',
            backgroundColor: 'rgb(150, 180, 44)',
            borderColor: 'rgb(60, 59, 10)',
            data: [0, 10, 5, 2, 20, 30, 45]    

        }]


    },

    // Configuration options go here
    options: {}
});

</script>