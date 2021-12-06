function init (canvas){
    cw2 = canvas.width  = graficos.offsetWidth;
    ch2 = canvas.height = graficos.offsetHeight;
    context.drawImage(img, 0, 0, cw2, ch2);
}
function pintarChar(ctotales){
    let arrayFechas = [];
    let arrayDatosGlucemia = [];
    let arrayDatosPeso= [];
    let arrayDatosTASIS= [];
    let arrayDatosTADIAS= [];
    let arrayDatosSO= [];
    for (let i = 0; i < ctotales.length; i++) {
        //SUMANDO VALORES A LOS ARRAY
        arrayDatosGlucemia.push(ctotales[i]['glucemia']);
        arrayDatosPeso.push(ctotales[i]['peso']);
        arrayDatosTASIS.push(ctotales[i]['tension_arterial_sistolica']);
        arrayDatosTADIAS.push(ctotales[i]['tension_arterial_diastolica']);
        arrayDatosSO.push(ctotales[i]['saturacion_oxigeno']);
        fecha = ctotales[i]['fecha_cons']['date'];
        arrayFechas.push(fecha.split(" ")[0]);
    }
    var ctx = document.getElementById('graficos').getContext("2d");
    let myChart = new Chart(ctx,{
        type:"line",
        data:{
            labels:arrayFechas,
            datasets:[
                {
                    label:'Glucemia',
                    data:arrayDatosGlucemia,
                    backgroundColor:[
                        'rgb(144,1,55)',
                    ],
                    borderColor:'red'
                },
                {
                    label:'Peso',
                    data:arrayDatosPeso,
                    backgroundColor:[
                        'rgb(33,1,55)',
                    ],
                    borderColor:'rgb(33,1,55)'
                },
                {
                    label:'Tension Arterial Sistólica',
                    data:arrayDatosTASIS,
                    backgroundColor:[
                        'rgb(77,12,155)',
                    ],
                    borderColor:'rgb(77,12,155)'
                },
                {
                    label:'Tension Arterial Diastólica',
                    data:arrayDatosTADIAS,
                    backgroundColor:[
                        'rgb(238,49,228)',
                    ],
                    borderColor:'rgb(79,125,155)'
                },
                {
                    label:'Saturacion de Oxigeno en sangre',
                    data:arrayDatosSO,
                    backgroundColor:[
                        'rgb(77,12,155)',
                    ],
                    borderColor:'rgb(60,212,75)'
                }

            ]
        },
        options:{
            scales:{
                y:{
                    beginAtZero:true
                }
            }
        }
    });
}