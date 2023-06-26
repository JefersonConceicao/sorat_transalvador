@extends('layout.admin.index')
@section('content-title', 'Associar Menu ao Usuário')
@section('back-button', route('user.index'))

@section('content-body')
    @if (session('success'))
        <x-alert_success>
            {{ session('success') }}
        </x-alert_success>
    @endif

    <div class="row mb-3">
        <div class="col-xl-12">
            <div class="alert-message alert-message-default">
                <h4> {{  $user->usu_nom_usuario ?? "Não informado "}}</h4>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <form method="GET">
                    <div class="card-header">
                        <h3 class="card-title"> Filtro <i class="fa fa-filter"> </i> </h3>
                        <span class="float-right">
                            <i class="fa fa-fw clickable fas fa-arrow-up"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Nome </label>
                                    <input type="text" class="form-control" name="nome_menu"
                                        value="{{ old('nome_menu') }}" />
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Controller </label>
                                    <select class="form-control select2" name="controller_id">
                                        <option value=""> Selecione </option>

                                        @foreach ($optionsController as $controller)
                                            @if ($controller == old('controller_id'))
                                                <option value="{{ $controller }}" selected> {{ $controller }} </option>
                                            @else
                                                <option value="{{ $controller }}"> {{ $controller }} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Action </label>
                                    <input type="text" class="form-control" name="nom_action"
                                        value="{{ old('nom_action') }}" />
                                </div>
                            </div>

                            <div class="col-md-2 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Menu Visitante? </label>
                                    <select class="form-control select2" name="menu_visitante">
                                        <option value=""> Selecione </option>
                                        <option value="1" @if (old('menu_visitante') == '1') selected @endif> Sim
                                        </option>
                                        <option value="0" @if (old('menu_visitante') == '0') selected @endif> Não
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Menu Administrativo? </label>
                                    <select class="form-control select2" name="menu_administrativo">
                                        <option value=""> Selecione </option>
                                        <option value="1" @if (old('menu_administrativo') == '1') selected @endif> Sim
                                        </option>
                                        <option value="0" @if (old('menu_administrativo') == '0') selected @endif> Não
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Ativo? </label>
                                    <select class="form-control select2" name="ativo">
                                        <option value=""> Selecione </option>
                                        <option value="1" @if (old('ativo') == '1') selected @endif> Sim
                                        </option>
                                        <option value="0" @if (old('ativo') == '0') selected @endif> Não
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
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

    <div class="row mt-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-responsive">
                    @if ($menusDesassociados->isEmpty())
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center alert alert-default">
                                    <h4> Sem registros. </h4>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-xl-12">
                                <p class="text-primary"> Total de registros: {{ $menusDesassociados->total() }} </p>
                            </div>
                        </div>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> Nome Menu</th>
                                    <th> Nome Controller </th>
                                    <th> Nome Action </th>
                                    <th width="2%"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menusDesassociados as $menu)
                                    <tr>
                                        <td> {{ $menu->men_nom_menu ?? '' }} </td>
                                        <td> {{ $menu->men_nom_controller ?? '(Não definido)' }}</td>
                                        <td> {{ $menu->men_nom_action ?? '(Não definido)' }}</td>
                                        <td>
                                            <label class="checkbox-inline">
                                                <input 
                                                    type="checkbox" 
                                                    class="associarMenuUser"
                                                    id="{{ $menu->men_id_men }}"
                                                    id_user="{{ $user->usu_id_usu }}" id="{{ $menu->men_id_men }}"
                                                    @if(in_array($menu->men_id_men, $idsMenusAssociadosUsuario))
                                                        checked
                                                    @endif
                                                >
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $menusDesassociados->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
