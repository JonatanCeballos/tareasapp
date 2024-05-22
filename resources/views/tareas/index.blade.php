@extends('layouts.app')

@section('title', 'Tareas')

@section('content')
<div class="card recent-sales overflow-auto">
    <div class="card-body">
        <h5 class="card-title">
            Tareas
            <span>
                | Lista
            </span>
        </h5>
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">
                        Id
                    </th>
                    <th scope="col">
                        Fecha de Creacion
                    </th>
                    <th scope="col">
                        Fecha Limite
                    </th>
                    <th scope="col">
                        Descripcion
                    </th>
                    <th scope="col">
                        Estatus
                    </th>
                    <th scope="col">
                    </th>
                </tr>
            </thead>
            <tbody>
                    
                    @php($tareasExpiradas = 0 ) {{-- contador de tareas vencidas --}}

                    @foreach ($tareas as $tarea)

                    @if($tarea->tareaFechaLimite<date('Y-m-d'))
                        @php($tareasExpiradas += 1) {{-- contador de tareas vencidas --}}
                        @php($class="table-danger")
                    @else
                        @php($class="")
                    @endif

                    <tr class="{{ $class }}">
                        <th scope="row text-primary">
                            {{ $tarea->id}}
                        </th>
                        <td>
                            {{ $tarea->tareaFechaCreacion }}
                        </td>
                        <td>
                            {{ $tarea->tareaFechaLimite }}
                        </td>
                        <td>
                            {{ $tarea->tareaDescripcion }}
                        </td>
                        <td>
                            @if( strcasecmp($tarea->tareaEstado,"Solicitada")===0 )
                                @php($clasSpan="bg-primary")
                            @elseif (strcasecmp($tarea->tareaEstado,"En proceso") === 0)
                                @php($clasSpan="bg-success")
                            @elseif (strcasecmp($tarea->tareaEstado,"Pausada") ===0)
                                @php($clasSpan="bg-warning text-primary")
                            @elseif (strcasecmp($tarea->tareaEstado,"Finalizada") ===0)
                                @php($clasSpan="bg-danger")
                            @endif
                            <span class="badge {{ $clasSpan }}">
                                {{ $tarea->tareaEstado }}
                            </span>
                        </td>
                        <td>
                            
                            @if(strcasecmp($tarea->tareaEstado,"Finalizada") !==0)
                                <div class="row">
                                    <div class="col-4">
                                        @if( strcasecmp($tarea->tareaEstado,"Solicitada")===0 )
                                            @php($txtbtn="Comenzar")
                                            @php($newEstado="En proceso")
                                        @elseif (strcasecmp($tarea->tareaEstado,"En proceso") === 0)
                                            @php($txtbtn="Pausar")
                                            @php($newEstado="Pausada")
                                        @elseif (strcasecmp($tarea->tareaEstado,"Pausada") ===0)
                                            @php($txtbtn="Comenzar")
                                            @php($newEstado="En proceso")
                                        @endif

                                    
                                        <form method="POST" action="{{ route('tareas.update',$tarea) }}">
                                        @csrf
                                        @method('PUT')

                                            <input class="form-control" name="tareaEstado" type="hidden" value="{{ $newEstado }}">
                                            </input>

                                            <button type="submit" class="btn btn-success text-white" >
                                                {{ $txtbtn }}
                                            </button>
                                        </form>
                                    </div>

                                    <div class="col-4">
                                        <form method="POST" action="{{ route('tareas.update',$tarea) }}">
                                        @csrf
                                        @method('PUT')

                                            <input class="form-control" name="tareaEstado" type="hidden" value="Finalizada">
                                            </input>

                                            <button class="btn btn-danger text-white" >
                                                Finalizar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach

                    {{-- avertencia de tareas vencidas --}}
                    @if($tareasExpiradas>0 && strcasecmp($tarea->tareaEstado,"Finalizada")!==0)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>
                            Pendiente!
                        </strong>
                        Hay {{ $tareasExpiradas }} tareas vencidas
                        <button aria-label="Close" class="btn-close" data-bs-dismiss="alert" type="button">
                        </button>
                    </div>
                    @endif
                    {{-- fin alerta --}}

                

            </tbody>
        </table>
    </div>
</div>

@endsection
