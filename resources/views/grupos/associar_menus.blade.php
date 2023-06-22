@extends('layout.admin.index')
@section('back-button', route('grupos.index'))
@section('content-title', "Associar Menu's")

@section('content-body')
    <div class="row mb-3">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="alert-message alert-message-default">
                        <h4> <a href="{{ route('grupos.edit', $grupo->gru_id_gru) }}"> {{ $grupo->gru_nom_grupo }} </a> </h4>
                        <p> Menu's associados: {{ count($idsMenusAssociados) }} </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Filtro <i class="fa fa-filter"> </i> </h3>
                </div>
                <div class="card-body">
                    <form method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label> Nome Menu </label>
                                <input type="text" class="form-control" name="nome_menu" value="{{ old('nome_menu') }}"/>
                            </div>
                            
                            <div class="col-md-3">
                                <label> Nome Controller </label>
                                <select class="form-control select2" name="nome_controller"> 
                                    <option value=""> Selecione </option>

                                    @foreach($optionsController as $nomeController)
                                        @if($nomeController == old('nome_controller'))
                                            <option selected value="{{ $nomeController }}"> {{ $nomeController }} </option>
                                        @else 
                                            <option value="{{ $nomeController }}"> {{ $nomeController }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label> Nome Action </label>
                                <input type="text" class="form-control" name="nome_action" value="{{ old('nome_action') }}"/>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xl-12">
                                <button class="btn btn-primary float-right" type="submit">
                                    <i class="fa fa-search"> </i> Pesquisar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
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
                                <tr> 
                                    @foreach($menusDesassociados as $menu)
                                        <tr>
                                            <td> {{ $menu->men_nom_menu ?? "" }} </td>
                                            <td> {{ $menu->men_nom_controller ?? "(Não definido)" }}</td>
                                            <td> {{ $menu->men_nom_action ?? "(Não definido)" }}</td>
                                            <td>   
                                                <label class="checkbox-inline">
                                                    <input 
                                                        type="checkbox" 
                                                        class="associarMenuGrupo"
                                                        id_grupo="{{ $grupo->gru_id_gru  }}" 
                                                        id="{{ $menu->men_id_men }}" 
                                                        @if(in_array($menu->men_id_men, $idsMenusAssociados))
                                                            checked
                                                        @endif 
                                                    >
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        {{ $menusDesassociados->links() }}    
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
