@extends('theme.back.app')
@section('titulo')
    Sistema Menu
@endsection

@section('scripts')
    <script src="{{asset("assets/back/js/pages/scripts/menu/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        <div class="col-md-12">
            <div class="card-header">
                crear Menus
            </div>
            <form action="{{route("menu.guardar")}}" id="form-general" class="form-horizontal" method="POST">
                @csrf
                <div class="card-body">
                    @include('theme.back.menu.form')
                </div>
                <div class="border-top">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-5">
                            <button class="btn btn-success" type="submit">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection