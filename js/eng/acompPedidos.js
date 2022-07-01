$(document).ready(function() {

    /*
     * Gráfico de solicitação de mateirais por ano 
     */
    param_1 = { opcao_1: 'solicitacao_mes' }
    $.get('../../dao/eng/popularAcomp.php', param_1, function(mes) {
        var chartDom = document.getElementById('graficoSolic');
        var myChart = echarts.init(chartDom);
        var option;
        option = {
            xAxis: {
                type: 'category',
                data: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez']
            },
            yAxis: {
                type: 'value'
            },
            series: [{
                data: [mes.janeiro, mes.fevereiro, mes.marco, mes.abril, mes.maio, mes.junho, mes.julho, mes.agosto, mes.setembro, mes.outubro, mes.novembro, mes.dezembro],
                type: 'line'
            }]
        };
        option && myChart.setOption(option);
    }, "json");

    /*
     * Gráfico de áreas
     */
    param_2 = { opcao_2: 'usuario_status' }
    $.get('../../dao/eng/popularAcomp.php', param_2, function(obj) {
        var chartDom = document.getElementById('graficoAreas');
        var myChart = echarts.init(chartDom);
        var option;

        option = {
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    // Use axis to trigger tooltip
                    type: 'shadow' // 'shadow' as default; can also be 'line' or 'shadow'
                }
            },
            legend: {},
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: {
                type: 'value'
            },
            yAxis: {
                type: 'category',
                data: ['JvsTomaz', 'CtSilva', 'VgSouza', 'BsCastro', 'MarSantos']
            },
            series: [{
                    name: 'Aprovar',
                    type: 'bar',
                    stack: 'total',
                    label: {
                        show: true
                    },
                    emphasis: {
                        focus: 'series'
                    },
                    data: [obj.jvstomaz.aprovar, obj.ctsilva.aprovar, obj.vgsouza.aprovar, obj.bscastro.aprovar, obj.marsantos.aprovar]
                },
                {
                    name: 'Aprovado',
                    type: 'bar',
                    stack: 'total',
                    label: {
                        show: true
                    },
                    emphasis: {
                        focus: 'series'
                    },
                    data: [obj.jvstomaz.aprovado, obj.ctsilva.aprovado, obj.vgsouza.aprovado, obj.bscastro.aprovado, obj.marsantos.aprovado]
                },
                {
                    name: 'Reprovado',
                    type: 'bar',
                    stack: 'total',
                    label: {
                        show: true
                    },
                    emphasis: {
                        focus: 'series'
                    },
                    data: [obj.jvstomaz.reprovado, obj.ctsilva.reprovado, obj.vgsouza.reprovado, obj.bscastro.reprovado, obj.marsantos.reprovado]
                },
                {
                    name: 'Autorizado',
                    type: 'bar',
                    stack: 'total',
                    label: {
                        show: true
                    },
                    emphasis: {
                        focus: 'series'
                    },
                    data: [obj.jvstomaz.autorizado, obj.ctsilva.autorizado, obj.vgsouza.autorizado, obj.bscastro.autorizado, obj.marsantos.autorizado]
                },
                {
                    name: 'Desautorizado',
                    type: 'bar',
                    stack: 'total',
                    label: {
                        show: true
                    },
                    emphasis: {
                        focus: 'series'
                    },
                    data: [obj.jvstomaz.desautorizado, obj.ctsilva.desautorizado, obj.vgsouza.desautorizado, obj.bscastro.desautorizado, obj.marsantos.desautorizado]
                }
            ]
        };

        option && myChart.setOption(option);
    }, "json");



    param_3 = { opcao_3: 'status_total' }
    $.get('../../dao/eng/popularAcomp.php', param_3, function(stt) {
        console.log(stt);
        /*
         * Gráfico de status
         */
        var graficoStatus = document.getElementById('graficoStatus');
        var myGraficoStatus = echarts.init(graficoStatus);
        var statusOption;
        statusOption = {
            title: {
                text: 'Status das Solicitações',
                subtext: '05/2022',
                left: 'center'
            },
            tooltip: {
                trigger: 'item'
            },
            legend: {
                orient: 'horizontal',
                left: 'center',
                top: 'bottom'
            },
            series: [{
                name: 'Quantidade',
                type: 'pie',
                radius: '50%',
                data: [{
                        value: stt.aprovar,
                        name: 'Aprovar'
                    },
                    {
                        value: stt.aprovado,
                        name: 'Aprovado'
                    },
                    {
                        value: stt.reprovado,
                        name: 'Reprovado'
                    },
                    {
                        value: stt.desautorizado,
                        name: 'Desautorizado'

                    },
                    {
                        value: stt.autorizado,
                        name: 'Autorizado'
                    }
                ],
                emphasis: {
                    itemStyle: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }]
        };
        statusOption && myGraficoStatus.setOption(statusOption);
    }, "json");
})

// menu toggle
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');

toggle.onclick = function() {
    navigation.classList.toggle('active');
    main.classList.toggle('active');
}

// add hovered class in selected list item
let list = document.querySelectorAll('.navigation li');

function activeLink() {
    list.forEach((item) =>
        item.classList.remove('hovered'));
    this.classList.add('hovered');
}
list.forEach((item) => item.addEventListener('mouseover', activeLink));