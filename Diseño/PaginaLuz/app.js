class PreciosApp {
    constructor() {
        // Inicializar con los datos inyectados por PHP 
        this.fechas = INITIAL_FECHAS;
        this.precios = INITIAL_PRECIOS; 
        this.fechaSeleccionada = INITIAL_FECHA_SELECCIONADA;

        this.grafica1 = null;
        this.grafica2 = null;
        
        this.init();
    }

    
    init() {
        this.actualizarInterfaz();
        this.crearGrafica1();
        this.crearGrafica2(); 
    }

   


    actualizarSelectorFechas() {
        const selector = document.getElementById('selector-fecha');
        selector.value = this.fechaSeleccionada;
    }



    actualizarInterfaz() {
        // Lógica para actualizar las estadísticas y la lista de horas
        if (this.precios.length === 0) {
            document.getElementById('fecha-actual').textContent = this.formatearFecha(this.fechaSeleccionada);
            document.getElementById('lista-horas').innerHTML = '<p>No hay datos de precios para esta fecha.</p>';
            return;
        }

        const preciosData = this.precios.map(item => item.precio);
        const precioMedio = preciosData.reduce((a, b) => a + b, 0) / preciosData.length;
        const precioMax = Math.max(...preciosData);
        const precioMin = Math.min(...preciosData);

        const horaMax = this.precios.find(item => item.precio === precioMax).hora.substring(0, 5);
        const horaMin = this.precios.find(item => item.precio === precioMin).hora.substring(0, 5);

        document.getElementById('fecha-actual').textContent = this.formatearFecha(this.fechaSeleccionada);
        document.getElementById('fecha-media').textContent = this.formatearFecha(this.fechaSeleccionada);
        document.getElementById('fecha-baja').textContent = this.formatearFecha(this.fechaSeleccionada);
        document.getElementById('fecha-alta').textContent = this.formatearFecha(this.fechaSeleccionada);
        document.getElementById('precio-medio').textContent = precioMedio.toFixed(4);
        document.getElementById('hora-alta').textContent = horaMax;
        document.getElementById('precio-alto').textContent = precioMax.toFixed(5) + ' €/kWh';
        document.getElementById('hora-baja').textContent = horaMin;
        document.getElementById('precio-bajo').textContent = precioMin.toFixed(5) + ' €/kWh';
        
    }

    
    // GRÁFICA 1 
    crearGrafica1() {
        const ctx = document.getElementById('grafica1').getContext('2d');
        
        if (this.grafica1) {
            this.grafica1.destroy();
        }
        const horas = this.precios.map(item => item.hora.substring(0, 5));
        const preciosData = this.precios.map(item => item.precio);
        
        const coloresFondo = preciosData.map(precio => {
            if (precio < 0.10) {
                return 'rgba(28, 194, 36, 1)'; 
            }  else if (precio < 0.20) {
                return 'rgba(255, 193, 7, 0.7)'; 
            } else {
                return 'rgba(244, 67, 54, 0.7)'; 
            }
        });

        const coloresBorde = preciosData.map(precio => {
            if (precio < 0.10) {
                return 'rgb(56, 142, 60)';
            } else if (precio < 0.20) {
                return 'rgb(205, 147, 0)';
            } else {
                return 'rgb(198, 40, 40)';
            }
        });
       

        this.grafica1 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: horas,
                datasets: [{
                    label: 'Precio (€/kWh)',
                    data: preciosData,
                    backgroundColor: coloresFondo,
                    borderColor: coloresBorde,
                    borderWidth: 2,
                    borderRadius: 5,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Precio: €${context.parsed.y.toFixed(5)}/kWh`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        title: {
                            display: true,
                            text: 'Precio (€/kWh)'
                        },
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Hora del día'
                        },
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }

    // GRÁFICA 2 
    crearGrafica2() {
        const ctx = document.getElementById('grafica2').getContext('2d');
        //Borra en caso de que haya alguna antes
        if (this.grafica2) {
            this.grafica2.destroy();
        }
        
        // Cogemos los datos horarios del día seleccionado (this.precios)
        const horas = this.precios.map(item => item.hora.substring(0, 5));
        const preciosData = this.precios.map(item => item.precio);

        this.grafica2 = new Chart(ctx, {
            type: 'line',
            data: {
                labels: horas,
                datasets: [{
                    label: 'Precio (€/kWh)',
                    data: preciosData, 
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: false,
                        title: { display: true, text: 'Precio (€/kWh)' }
                    },
                    x: {
                        title: { display: true, text: 'Hora del día' } 
                    }
                }
            }
        });
    }

    // Funciones de formato
    formatearFecha(fechaISO) {
        const fecha = new Date(fechaISO + 'T00:00:00');
        return fecha.toLocaleDateString('es-ES');
    }

    formatearFechaCorta(fechaISO) {
        const fecha = new Date(fechaISO + 'T00:00:00');
        return fecha.toLocaleDateString('es-ES', { day: '2-digit', month: 'short' });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new PreciosApp();
});