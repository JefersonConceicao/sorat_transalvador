@extends('layout.admin.index')
@section('back-button', route('user.index'))
@section('content-title', 'Cadastrar Usuário')

@section('content-body')
    @if (session('success'))
        <x-alert_success>
            {{ session('success') }}
        </x-alert_success>
    @endif

    <form action="{{ route('user.store') }}" method="POST"> 
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="usu_nom_usuario"> Nome Completo <span class="text-danger"> * </span> </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="usu_nom_usuario" 
                                id="usu_nom_usuario" 
                                value="{{ old('usu_nom_usuario') }}"
                            />

                            <p class="text-danger">
                                @error('usu_nom_usuario')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="usu_nom_login"> Login <span class="text-danger"> * </span> </label>
                            <input 
                                type="text" 
                                class="form-control" 
                                name="usu_nom_login" 
                                id="usu_nom_login"
                                value="{{ old('usu_nom_login') }}"
                            />


                            <p class="text-danger">
                                @error('usu_nom_login')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="grupo_id"> Grupo <span class="text-danger"> * </span> </label>

                            <select 
                                class="form-control select2" 
                                name="grupo_id" 
                                id="grupo_id"
                            >                            
                                @foreach($optionsGrupos as $idGrupo => $nameGrupo)
                                    @if(old('grupo_id') == $idGrupo)
                                        <option value="{{ $idGrupo }}" selected> {{ $nameGrupo }} </option>
                                    @endif 

                                    <option value="{{ $idGrupo }}"> {{ $nameGrupo }} </option>
                                @endforeach
                            </select>

                            <p class="text-danger">
                                @error('grupo_id')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="status"> Status  <span class="text-danger"> * </span> </label>

                            <select class="form-control select2" name="ativo" id="status">                        
                                <option value="1" @if(old('ativo') == "1") selected @endif> Ativo </option>
                                <option value="0" @if(old('ativo') == "0") selected @endif>  Inativo </option>
                            </select>

                            <p class="text-danger">
                                @error('ativo')
                                    {{ $message }}
                                @enderror
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button class="btn btn-primary float-right" type="submit"> 
                            <i class="fa fa-save"></i> Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection
