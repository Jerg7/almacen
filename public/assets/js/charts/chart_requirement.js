document.addEventListener("DOMContentLoaded", function() {
    drawChart();
});

function drawChart() {
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar', // o 'pie' para gráfico circular
        data: {
            labels: articleIds,
            datasets: [{
                label: 'Cantidad de solicitudes por artículo',
                data: totals,
                backgroundColor: '#125873', //colors
                borderColor: '#00415A', //colors
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Función para generar colores aleatorios
function generateRandomColors(numColors) {
    var colors = [];
    for (var i = 0; i < numColors; i++) {
        var color = '#' + Math.floor(Math.random()*16777215).toString(16); // Generar color hexadecimal aleatorio
        colors.push(color);
    }
    return colors;
}