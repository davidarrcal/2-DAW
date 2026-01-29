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
        backgroundColor: 'rgba(255, 99, 132, 0.2)',
        borderColor: 'rgba(255, 99, 132, 1)',
        borderWidth: 2,
        type: 'bar',
    };

    const datosLluvias = {
        label: "Lluvia (mm)",
        data: datos.lluvias,
        backgroundColor: 'rgba(54, 162, 235, 0.5)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        type: 'bar',
    };

    new Chart($grafica, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [datosTemperaturas, datosLluvias],
        },
        options: {
            scales: {
                y: {
                    type: 'linear',
                    display: true,
                    position: 'left',
                    title: {
                        display: true,
                        text: 'Temperatura (°C)  y  lluvias (mm)'
                    }
                },
            },
        }
    });
 
    