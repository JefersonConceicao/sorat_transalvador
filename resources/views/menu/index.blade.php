@extends('layout.admin.index')
@section('content-title', 'Menu')

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
                            <i class="fa fa-fw clickable fas fa-arrow-up"></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Nome </label>
                                    <input type="text" class="form-control" name="nom_menu"
                                        value="{{ old('nom_menu') }}" />
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Controller </label>
                                    <select class="form-control select2" name="controller_id">
                                        <option> Selecione </option>
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

                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Menu Módulo? </label>
                                    <select class="form-control select2" name="menu_modulo">
                                        <option> Selecione </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Menu Visitante? </label>
                                    <select class="form-control select2" name="menu_visitante">
                                        <option> Selecione </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Menu Administrativo? </label>
                                    <select class="form-control select2" name="menu_visitante">
                                        <option> Selecione </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-2 col-sm-6">
                                <div class="form-group">
                                    <label> Ativo? </label>
                                    <select class="form-control select2" name="ativo">
                                        <option> Selecione </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
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

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 text-right mb-2">
                            <a class="btn btn-sm btn-primary button button-3d" href="{{ route('menu.create') }}">
                                Novo <i class="fa fa-plus-square"> </i>
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th> Nome Menu </th>
                                <th> Controller </th>
                                <th> Action </th>
                                <th width="3%"> Menu Módulo? </th>
                                <th width="3%"> Menu Visitante? </th>
                                <th width="3%"> Menu Administrativo? </th>
                                <th width="3%"> Ativo? </th>
                                <th> Menu Pai </th>
                                <th width="15%" class="text-center"> Ações </th>
                            </thead>
                            <tbody>
                                @foreach($dados as $dado)
                                    <tr>
                                        <td> {{  $dado->men_nom_menu ?? "Não informado" }} </td>
                                        <td> {{  $dado->men_nom_controller ?? "Não informado"}} </td>
                                        <td> {{  $dado->men_nom_action ?? "Não informado" }} </td>
                                        <td class="text-center">     
                                            <span> 
                                                @if($dado->men_flg_modulo)
                                                <span class="text-success"> <i class='fa fa-check'> </i> </span>
                                                @else 
                                                <span class="text-danger"> <i class='fa fa-close'> </i> </span>
                                                @endif 
                                            </span>
                                        <td class="text-center">      
                                            <span> 
                                                @if($dado->men_flg_menu_guest)
                                                    <span class="text-success"> <i class='fa fa-check'> </i> </span>
                                                @else 
                                                    <span class="text-danger"> <i class='fa fa-close'> </i> </span>
                                                @endif 
                                            </span>
                                        </td>
                                        <td class="text-center"> 
                                            <span> 
                                                @if($dado->men_flg_menu_admin)
                                                    <span class="text-success"> <i class='fa fa-check'> </i> </span>
                                                @else 
                                                    <span class="text-danger"> <i class='fa fa-close'> </i> </span>
                                                @endif 
                                            </span>
                                        </td>
                                        <td class="text-center">  
                                            <span> 
                                                @if($dado->men_flg_ativo)
                                                    <span class="text-success"> <i class='fa fa-check'> </i> </span>
                                                @else 
                                                    <span class="text-danger"> <i class='fa fa-close'> </i> </span>
                                                @endif 
                                            </span>
                                        </td>
                                        <td> {{ $dado->menu->men_nom_menu ?? "" }}</td>
                                        <td width="5%" class="text-center">
                                            <a href={{ route('menu.edit', $dado->men_id_men) }}
                                                class="btn btn-primary btn-rounded btn-sm">
                                                <i class="fa fa-edit"> </i>
                                            </a>
                                            <a class="btn btn-danger btn-rounded btn-sm">
                                                <span class="text-white"> <i class="fa fa-trash"> </i> </span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
