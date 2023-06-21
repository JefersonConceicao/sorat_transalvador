@extends('layout.admin.index')
@section('content-title', 'Grupos')

@section('content-body')
    @if(session('success'))
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
                                    <input type="text" class="form-control" name="nom_grupo" value="{{ old('nom_grupo')}}" />
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
                            <a class="btn btn-sm btn-primary button button-3d" href="{{ route('grupos.create') }}">
                                Novo <i class="fa fa-plus-square"> </i>
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th> Nome </th>
                                <th> Url Padrão </th>
                                <th width="15%" class="text-center"> Ações </th>
                            </thead>
                            <tbody>
                                @foreach ($dados as $dado)
                                    <tr>
                                        <td> {{ $dado->gru_nom_grupo }} </td>
                                        <td> {{ $dado->gru_url_padrao }} </td>
                                        <td>
                                            <a href={{ route('grupos.edit', $dado->gru_id_gru) }}
                                                class="btn btn-primary btn-rounded btn-sm">
                                                <i class="fa fa-edit"> </i>
                                            </a>
                                            <a class="btn btn-primary btn-rounded btn-sm" href="{{ route('grupos.associarMenus', $dado->gru_id_gru) }}">
                                                <i class="fa fa-desktop"> </i>
                                            </a>
                                            <a href={{ route('grupos.delete', $dado->gru_id_gru) }}
                                                class="btn btn-danger btn-rounded btn-sm">
                                                <i class="fa fa-trash"> </i>
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
