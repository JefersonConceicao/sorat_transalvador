@extends('layout.admin.index')
@section('content-title', 'Parametros')

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
                                    <input 
                                    type="text" 
                                    class="form-control" 
                                    name="par_nom_parametro"
                                    value="{{ old('par_nom_parametro') }}" />
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
                            <a class="btn btn-sm btn-primary button button-3d" href="{{ route('parametros.create') }}">
                                Novo <i class="fa fa-plus-square"> </i>
                            </a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th width="25%"> Nome Identificador </th>
                                <th width="25%"> Valor de Retorno </th>
                                <th width="5%"> Ações </th>
                            </thead>
                            <tbody>
                                @foreach ($dados as $dado)
                                    <tr>
                                        <td> <b> {{ $dado->par_nom_parametro ?? '' }} </b> </td>
                                        <td style="max-width:25%;"> {{ $dado->par_des_retorno ?? '' }} </td>
                                        <td> 
                                            <a href="{{ route('parametros.edit', $dado->par_nom_parametro) }}" class="btn-sm btn btn-primary"> 
                                                <i class="fa fa-edit"> </i>
                                            </a>
                                            <a type="button" class="btn btn-danger btn-sm"> 
                                                <i class="fa fa-trash"> </i>
                                            </a>    
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
