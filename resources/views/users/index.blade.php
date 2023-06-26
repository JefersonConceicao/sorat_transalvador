@extends('layout.admin.index')
@section('content-title', 'Usuários')

@section('content-body')

    @if (session('success'))
        <x-alert_success>
            {{ session('success') }}
        </x-alert_success>
    @endif

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="GET">
                    <div class="card-header">
                        <h3 class="card-title"> Filtro <i class="fa fa-filter"> </i> </h3>

                        <span class="float-right">
                            <i class="fa fa-fw clickable ti-angle-up"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Nome </label>
                                    <input type="text" class="form-control" name="usu_nom_usuario"
                                        value="{{ old('usu_nom_usuario') }}" />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Login </label>
                                    <input type="text" class="form-control" name="usu_nom_login"
                                        value="{{ old('usu_nom_login') }}" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Grupo </label>

                                    <select class="form-control select2" name="grupo_id" value="{{ old('grupo_id') }}">
                                        <option value=""> Selecione </option>
                                        
                                        @foreach($optionsGrupos as $idGrupo => $nameGrupo)
                                            <option value="{{ $idGrupo }}"> {{ $nameGrupo }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label> Status </label>

                                    <select class="form-control select2" name="ativo" value="{{ old('ativo') }}">
                                        <option value=""> Selecione </option>
                                        <option value="1"> Ativo </option>
                                        <option value="0"> Inativo </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button class="btn btn-primary float-right">
                                    <i class="fa fa-search"></i> Pesquisar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right mb-2">
                            <a class="btn btn-sm btn-primary button button-3d" href="{{ route('user.create') }}">
                                Novo Usuário <i class="fa fa-plus-square"> </i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="text-primary"> Total de registros: <b> {{ $dados->total() }} </b> </p>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th> Nome </th>
                                <th> Login </th>
                                <th> Grupo </th>
                                <th> Status </th>
                                <th width="15%" class="text-center"> Ações </th>
                            </thead>

                            <tbody>
                                @foreach ($dados as $dado)
                                    <tr>
                                        <td> {{ $dado->usu_nom_usuario ?? '' }} </td>
                                        <td> {{ $dado->usu_nom_login ?? '' }} </td>
                                        <td> {{ $dado->grupo->gru_nom_grupo ?? '' }} </td>

                                        <td width="2%"> 
                                            <span class="badge badge-{{ $dado->usu_flg_ativo ? 'success' : 'danger' }}">
                                                {{ $dado->usu_flg_ativo ? 'Ativo' : 'Inativo' }} 
                                            </span> 
                                        </td>
                                        
                                        <td align="center">
                                            <a 
                                               href={{ route('user.edit', $dado->usu_id_usu) }}
                                               class="btn btn-primary btn-rounded btn-sm"
                                               title="Editar Usuário"
                                            >
                                                <i class="fa fa-edit"> </i>
                                            </a>

                                            <a 
                                            class="btn btn-warning btn-rounded btn-sm" 
                                            href="{{ route('user.renderAssociarMenus', $dado->usu_id_usu) }}"
                                            title="Associar Menus ao Usuário"
                                            >
                                                <i class="fa fa-desktop"> </i>
                                            </a>

                                            @if($dado->usu_flg_ativo)
                                                <a class="btn btn-danger btn-rounded btn-sm btnInativarUsuario" id="{{ $dado->usu_id_usu }}">
                                                    <i class="fa fa-close"> </i>
                                                </a>
                                            @else
                                                <a class="btn btn-success btn-rounded btn-sm btnAtivarUsuario"  id="{{ $dado->usu_id_usu }}">
                                                    <i class="fa fa-check"> </i>
                                                </a>
                                            @endif 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div> 
                            {{ $dados->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
