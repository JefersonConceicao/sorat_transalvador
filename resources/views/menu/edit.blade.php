@extends('layout.admin.index')
@section('back-button', route('menu.index'))
@section('content-title', 'Alterar Menu')

@section('content-body')
    @if (session('error'))
        <x-alert_error>
            {{ session('error') }}
        </x-alert_error>
    @endif

    <form action="{{ route('menu.update', $dadosMenu->men_id_men) }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 col-xl-2 col-sm-6">
                                <div class="form-group">
                                    <label> Nome Menu <span class="text-danger"> * </span></label>
                                    <input type="text" class="form-control" name="men_nom_menu"
                                        value="{{ $dadosMenu->men_nom_menu }}" />

                                    <p class="text-danger">
                                        @error('men_nom_menu')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 col-xl-3 col-sm-6">
                                <div class="form-group">
                                    <label> Descrição do Menu </label>
                                    <input type="text" class="form-control" name="descricao_menu"
                                        value="{{ $dadosMenu->men_nom_descricao }}" />
                                </div>
                            </div>

                            <div 
                                class="col-md-2 col-sm-6 col-lg-4" 
                                id="column_input_controller" 
                                style="{{ $dadosMenu->men_flg_modulo ? 'display:none' : '' }}"
                            >
                                <div class="form-group">
                                    <label> Controller <span class="text-danger"> * </span> </label>
                                    <select class="form-control select2" name="men_nom_controller">
                                        <option value=""> Selecione </option>

                                        @foreach ($controllers as $controller)
                                            @if ($controller == $dadosMenu->men_nom_controller)
                                                <option value="{{ $controller }}" selected> {{ $controller }}</option>
                                            @endif

                                            <option value="{{ $controller }}"> {{ $controller }}</option>
                                        @endforeach
                                    </select>

                                    <p class="text-danger">
                                        @error('men_nom_controller')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>

                            <div class="col-md-2 col-sm-6" id="column_input_action" style="{{ $dadosMenu->men_flg_modulo ? 'display:none' : '' }}">
                                <div class="form-group">
                                    <label> Action <span class="text-danger"> * </span> </label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        name="nome_action"
                                        value="{{ $dadosMenu->men_nom_action }}" 
                                    />

                                    <p class="text-danger">
                                        @error('nome_action')
                                            {{ $message }}
                                        @enderror
                                    </p>
                                </div>
                            </div>

                            <div 
                                class="col-md-2 col-sm-6" id="column_url_externa"
                                style="{{ !$dadosMenu->men_flg_modulo ? 'display:none' : '' }}"
                            >
                                <div class="form-group">
                                    <label> Url Externa </label>
                                    <input type="text" class="form-control" name="url_externa" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-2 col-sm-4">
                                <label class="checkbox-inline icheckbox">
                                    <input 
                                        type="checkbox" 
                                        id="checkboxModulo" 
                                        name="flg_menu_modulo"
                                        @if ($dadosMenu->men_flg_modulo) checked @endif
                                    >
                                    Link Externo
                                </label>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <label class="checkbox-inline icheckbox">
                                    <input type="checkbox" id="checkboxVisitante" name="flg_menu_visitante"
                                        @if ($dadosMenu->men_flg_menu_guest) checked @endif>
                                    Menu Visitante
                                </label>
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <label class="checkbox-inline icheckbox">
                                    <input type="checkbox" id="checkboxAdministrativo" name="flg_menu_admin"
                                        @if ($dadosMenu->men_flg_menu_admin) checked @endif>
                                    Menu Administrativo
                                </label>
                            </div>

                            <div class="col-md-1 col-sm-4">
                                <label class="checkbox-inline icheckbox">
                                    <input type="checkbox" id="checkboxAtivo" name="flg_menu_ativo"
                                        @if ($dadosMenu->men_flg_ativo) checked @endif>
                                    Ativo
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1 col-sm-6">
                                <div class="form-group">
                                    <label> Icone </label>
                                    <div>
                                        <button type="button" class="btn btn-default btn-block" data-iconset="fontawesome5"
                                            data-icon="{{ $dadosMenu->men_htm_icon }}" role="iconpicker" data-search="true"
                                            data-search-text="Pesquise aqui..." data-placement="top" name="icon">
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-6">
                                <label> Menu Pai </label>
                                <select class="form-control select2" name="menu_pai_id">
                                    <option value=""> Selecione </option>

                                    @foreach ($optionsMenuPai as $idMenuPai => $menuPai)
                                        @if ($idMenuPai == $dadosMenu->men_id_men_pai)
                                            <option value={{ $idMenuPai }} selected> {{ $menuPai }} </option>
                                        @else
                                            <option value={{ $idMenuPai }}> {{ $menuPai }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('menu.index') }}" class="btn btn-default float-left bg-white"
                                    type="submit">
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
