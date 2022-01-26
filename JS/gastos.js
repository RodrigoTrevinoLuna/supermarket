//Obtener una referencia al elementos canvas del DOM
const $grafica = document.querySelector("#grafica");
//Las etiquetas son las que van en el eje X.
const etiquetas = ["Enero", "Febrero", "Marzo", "Abril","Mayo", "Junio", "JUlio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]

//Podemos tener verios conuntos de datos. 
const datosGastos2020 = {
    label: "Gastos Por Mes - 2020",
    data: [13000, 11272, 12120, 15002, 9221, 16492, 12345, 12740, 17910, 11540, 12460, 9321],//La data es un arreglo que debe tener la misma cantidad de valores que la etiqueta 
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde

};
const datosGastos2021 = {
    label: "Gastos por Mes - 2021 ",
    data: [14910, 11680, 11360, 12721, 13221, 11571, 14581, 9430, 15580, 12060, 9514, 12260],
    backgroundColor: 'rgba(255, 159, 64, 0.2)',// Color de fondo
    borderColor: 'rgba(255, 159, 64, 1)',// Color del borde
    borderWidth: 1,// Ancho del borde
}
new Chart($grafica, {
    type: 'line',// Tipo de gráfica
    data: {
        labels: etiquetas,
        datasets: [
            datosGastos2020,
            datosGastos2021,
            // Aquí más datos...
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }],
        },
    }
});