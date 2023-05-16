@extends('layout.admin.index')
@section('back-button', route('parametros.index'))
@section('content-title', 'Alterar Parametro')

@section('content-body')
    @if (session('success'))
        <x-alert_success>
            {{ session('success') }}
        </x-alert_success>
    @endif

    <form action="{{ route('parametros.update', $dadosParametro->par_nom_parametro ) }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> Nome Parametro <span class="text-danger"> * </span> </label>
                            <input type="text" class="form-control" name="par_nom_parametro" value="{{ $dadosParametro->par_nom_parametro }}" />

                            <p class="text-danger">
                                @error('par_nom_parametro')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label> Descrição do Parametro <span class="text-danger"> * </span> </label>
                            <input type="text" class="form-control has-error" name="par_des_retorno" value="{{ $dadosParametro->par_des_retorno }}"/>

                            <p class="text-danger">
                                @error('par_des_retorno')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right">
                            <i class="fa fa-save"> </i> Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
