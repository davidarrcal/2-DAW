const $grafica = document.querySelector("#grafica");

const etiquetas = [
    'Enero','Febrero','Marzo','Abril','Mayo','Junio',
    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'
];

// Obtener datos del sessionStorage
function obtenerDatosGuardados() {
    const datosGuardados = sessionStorage.getItem('datosMeteorologicos');
    if (datosGuardados) {
        return JSON.parse(datosGuardados);
    }
    return { temperaturas: [], lluvias: [] };
}

// Obtener datos
const datos = obtenerDatosGuardados();



    const datosTemperaturas = {
        label: "Temperaturas (ºC)",
        data: datos.temperaturas,
        backgroundColor: 'rgba(255, 99, 132, 0.5)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 1
    };

    new Chart($grafica, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [datosTemperaturas],
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


