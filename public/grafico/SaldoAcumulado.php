<!-- Se inserta la libreria highcharts utilizada para realizar el grafico -->
<script src="https://code.highcharts.com/highcharts.js"></script>

<!-- Contenedor donde entra el grafico -->
<div style="width: 100%; height:340px; " id="container"></div>

<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function(){
    Highcharts.chart('container',{
        chart: {
            type: 'column'
        },
        title: {
            text: '',
            style:{
                   color: 'rgba(6, 6, 29, 0.9)',
                   fontSize: '16px'
               } 
        },
        subtitle: {
          text: '',
          style:{
                color: 'rgba(6, 6, 29, 0.9)',
                fontSize: '13px'
            } 
        },
        xAxis: {
            categories: ['Semana 23', 'Semana 24','Semana 25','Semana 26','Semana 27']
        },
        yAxis: {
            title: {
                text: ''
            }
        },
        series: [{
            name: 'Ventas',
            data: [430, 568, 106, 389, 498]
            }, {
            name: 'Pago abonado',
            data: [430, 560.0, 106, 371.6, 140.9]
        }],
        
        // series: [{
        //     name: 'Ventas',
        //     data: [430, 568, 106, 389, 498]
        //     }],
    });
});
</script>