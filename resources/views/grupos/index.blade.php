@extends('layout.admin.index')
@section('content-title', 'Grupos')

@section('content-body')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
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
                                <input type="text" class="form-control"/> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-12 text-right mb-2">
                            <button class="btn btn-sm btn-primary">
                                Novo <i class="fa fa-plus-square"> </i>
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th> Nome </th>
                                <th> Url Padrão </th>
                                <th width="2%"> Ações </th>
                            </thead>
                            <tbody>
                                @foreach ($dados as $dado)
                                    <tr> 
                                        <td> {{ $dado->gru_nom_grupo }} </td>
                                        <td> {{ $dado->gru_url_padrao }} </td>
                                        <td> </td>
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
