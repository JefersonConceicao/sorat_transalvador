@extends('layout.admin.index')
@section('content-title', 'Cadastrar Grupo')

@section('content-body')
    <form action="{{ route('grupos.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Nome do Grupo </label>
                                    <input 
                                        type="text" class="form-control" 
                                        name="gru_nom_grupo"
                                        value="{{ old('gru_nom_grupo') }}" 
                                    />

                                    <p class="text-danger">
                                        @error('gru_nom_grupo')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Url Padrão Grupo </label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="gru_url_padrao"
                                        value="{{ old('gru_url_padrao') }}" 
                                    />

                                    <p class="text-danger">
                                        @error('gru_url_padrao')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('grupos.index') }}" class="btn btn-default float-left" type="submit">
                                    <i class="fa fa-arrow-left"> </i> Voltar
                                </a>
                                <button class="btn btn-primary float-right" type="submit">
                                    <i class="fa fa-file"> </i> Salvar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
