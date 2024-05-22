@extends('layouts.app')

@section('title', 'Tareas')

@section('content')
<script src="https://www.gstatic.com/charts/loader.js" type="text/javascript">
</script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['gantt']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'ID Tareas');
      data.addColumn('string', 'Descripcion');
      data.addColumn('date', 'Fecha de Creacion');
      data.addColumn('date', 'Fecha Limite');
      data.addColumn('number', 'Duration');
      data.addColumn('number', 'Percent Complete');
      data.addColumn('string', 'Dependencies');

      data.addRows([

      	@foreach ($tareas as $tarea)
      	
          ['{{ $tarea->id }}',
           '{{ $tarea->tareaDescripcion }}', 
           new Date('{{ $tarea->tareaFechaCreacion }}'.split(/[" " ]/)[0]), 
           new Date('{{ $tarea->tareaFechaLimite }}'),
           null, null, null],

        @endforeach
      ]);

      var options = {
        height: 400,
        gantt: {
          trackHeight: 30
        }
      };

      var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>
<div class="card recent-sales overflow-auto">
    <div class="card-body">
        <h5 class="card-title">
            Tareas
            <span>
                | Diagrama 
            </span>
        </h5>
        <div id="chart_div">
        </div>
    </div>
</div>
@endsection
