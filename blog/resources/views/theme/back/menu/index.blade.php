@extends('theme.back.app')
@section('titulo')
    Menu
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/back/extra-libs/nestable/jquery.nestable.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('scriptsPlugins')
    <script src="{{ asset('assets/back/extra-libs/nestable/jquery.nestable.js') }}" type="text/javascript"></script>

@endsection

@section('scripts')
    <script src="{{ asset('assets/back/js/pages/scripts/menu/index.js') }}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-lg-12">
            @if ($mensaje = session('mensaje'))
                <x-alert tipo="success" :mensaje="$mensaje" />
            @endif

            <div class="card">
                <div class="card-header bg-info">
                    <h5 class="text-white float-left">
                        Menus
                    </h5>
                    <a href="{{ route('menu.crear') }}" class="btn btn-outline-light btn-sm float-right">Crear</a>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="dd" id="nestable">
                        <ol class="dd-list">
                            @foreach ($menus as $key => $item)
                                @if ($item['menus_id'] != 0)
                                @break
                            @endif
                            @include('theme.back.menu.menu-item', ['item' => $item])
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmar-eliminar" tabindex="-1" role="dialog" aria-labelledby="confirmar-eliminar"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="inputTitleUsuario" align="center">Confirme esta accion</h4>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                Esta seguro de eliminar este Menu, Recurede que es menu padre tambien se eliminar los menu hijos
            </div>

            <div class="modal-footer">
                <div class="col-md-12">
                    <div><br></div>
                    <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger"
                        id="accion-eliminar">Si</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
