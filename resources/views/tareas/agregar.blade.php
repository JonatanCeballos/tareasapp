<div aria-hidden="true" aria-labelledby="staticBackdropLabel" class="modal face" data-bs-backdrop="static" data-bs-keyboard="false" id="staticBackdrop" tabindex="-1">
    
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{ route('tareas.store') }}" method="POST">
                @csrf

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        Agregar Nueva Tarea
                    </h5>
                    <button aria-label="Close" class="btn-close" data-bs-dismiss="modal" type="button">
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">

                        <div class="col-12">
                            <label for="floatingTextarea">
                                Descripcion
                            </label>

                            <textarea class="form-control" id="floatingTextarea" name="tareaDescripcion" style="height: 100px;"></textarea>

                            @error('tareaDescripcion')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-mb-3">

                            <label class="col-sm-2 col-form-label" for="inputDate">
                                Fecha limite 
                            </label>

                            <div class="col-sm-8">
                                @php($date= date("Y-m-d"))

                                <input class="form-control" name="tareaFechaLimite" type="date" min="{{ $date }}">
                                </input>
                            </div>

                            @error('tareaFechaLimite')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button class="btn btn-success text-white" type="submit">
                        Agregar
                    </button>

                </div>

            </form>
        </div>
    </div>
</div>

{{-- Activa la ventana modal en caso de existir error de formulario --}}
@if ($errors->any())
<script type="text/javascript">

    setTimeout(clickbtn, 500);

    function clickbtn(){
        $('#modalbtn').click();
    } 
</script>
@endif
