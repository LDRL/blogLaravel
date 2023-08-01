@extends('theme.back.app')
@section('titulo')
    Sistema Menu
@endsection

@section('scripts')
    <script src="{{asset("assets/back/js/pages/scripts/menu/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
    <div class="row">
        @if ($errors->any())
            <x-alert tipo="danger" :mensaje="$errors"/>
        @endif
        <div class="card">
            <div class="card-header bg-success">
                <h5 class="text-white float-left">Editar Menu {{$data->nombre}}</h5>
                <a href="{{route('menu')}}" class="btn btn-outline-light btn-sm float-right"> Volver al inicio</a>
            </div>
            <form action="{{route("menu.actualizar",$data->id)}}"  id="form-general"
                class="form-horizontal">
                @csrf @method('put')
                <div class="card-body">
                    @include("theme.back.menu.form")
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-5">
                                <button class="btn btn-success" type="button">Actualizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
@endsection