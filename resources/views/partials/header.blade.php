<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('tareas.index') }}">
            TareasApp
        </a>
        <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-bs-target="#navbarNav" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon">
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a aria-current="page" class="nav-link active" href="{{ route('diagrama.index') }}">
                        Diagrama de Gatt
                    </a>
                </li>
            </ul>
        </div>
        {{-- Activa la Ventana modal de Agregar tarea  --}}
        <div class="d-flex">
            <button class="btn btn-success text-white " data-bs-target="#staticBackdrop" data-bs-toggle="modal" id="modalbtn" type="button">
                Agregar Tarea
            </button>
        </div>
    </div>
</nav>

{{-- ventana modal para nuevas tareas --}}
@include('tareas.agregar')

