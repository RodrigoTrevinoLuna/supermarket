//Obtener una referencia al elementos canvas del DOM
const $grafica = document.querySelector("#grafica");
//Las etiquetas son las que van en el eje X.
const etiquetas = ["Enero", "Febrero", "Marzo", "Abril","Mayo", "Junio", "JUlio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"]

//Podemos tener verios conjuntos de datos. 
const datosVentas2020 = {
    label: "Ventas Por Mes - 2020",
    data: [14000, 10272, 16120, 14002, 12221, 21492, 10345, 19740, 16910, 17540, 11460, 14321],//La data es un arreglo que debe tener la misma cantidad de valores que la etiqueta 
    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Color de fondo
    borderColor: 'rgba(54, 162, 235, 1)', // Color del borde
    borderWidth: 1,// Ancho del borde

};
const datosVentas2021 = {
    label: "Ventas por Mes - 2021 ",
    data: [13910, 15680, 12360, 10721, 18221, 22571, 13581, 21430, 19580, 15060, 24514, 19260],
    backgroundColor: 'rgba(255, 159, 64, 0.2)',// Color de fondo
    borderColor: 'rgba(255, 159, 64, 1)',// Color del borde
    borderWidth: 1,// Ancho del borde
}
new Chart($grafica, {
    type: 'line',// Tipo de gráfica
    data: {
        labels: etiquetas,
        datasets: [
            datosVentas2020,
            datosVentas2021,
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
/*
//Obtener una referencia al elementos canvas del DOM
const $grafica = document.querySelector("#grafica2");
//Las etiquetas son las que van en el eje X.
const etiquetas = ["Producto 1", "Producto 2", "Producto3", "Producto 4", "Producto 5", "Producto 6", "Producto 7", "Producto 8", "Producto 9", "Producto 10"]

const topProductos = {
    label: "Productos Mas Vendidos",
    data: [54, 68, 126, 72, 221, 67, 135, 130, 95, 157],
    backgroundColor: 'rgba(255, 159, 64, 0.2)',// Color de fondo
    borderColor: 'rgba(255, 159, 64, 1)',// Color del borde
    borderWidth: 1,// Ancho del borde
}
new Chart($grafica2, {
    type: 'bar',// Tipo de gráfica
    data: {
        labels: etiquetas,
        datasets: [
            topProductos,
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
*/

