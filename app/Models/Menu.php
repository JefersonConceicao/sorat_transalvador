<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

/**
 * @property int $men_id_men
 * @property int $men_id_men_pai
 * @property int $men_id_csi
 * @property string $men_nom_menu
 * @property string $men_des_menu
 * @property string $men_htm_icon
 * @property string $men_nom_action
 * @property string $men_nom_controller
 * @property boolean $men_flg_menu_guest
 * @property boolean $men_flg_menu_admin
 * @property boolean $men_flg_modulo
 * @property boolean $men_flg_ativo
 * @property int $men_num_posicao
 * @property string $men_nom_url
 * @property string $men_nom_icon
 * @property string $men_nom_path
 * @property int $men_num_nivel
 * @property int $MEN_ID_MIGRACAO
 * @property int $MEN_ID_MIGRACAO_PAI
 * @property Menu $menu
 * @property ControleSistema $controleSistema
 * @property ControleMenu[] $controleMenu
 * @property GrupoMenu[] $grupoMenu
 * @property UsuarioMenu[] $usuarioMenu
 */
class Menu extends Model
{
    /**
     * @var string
     */
    protected $table = 'men_menu';

    /**
     * @var string
     */
    protected $primaryKey = 'men_id_men';

    /**
     * @var array
     */
    protected $fillable = ['men_id_men_pai', 'men_id_csi', 'men_nom_menu', 'men_des_menu', 'men_htm_icon', 'men_nom_action', 'men_nom_controller', 'men_flg_menu_guest', 'men_flg_menu_admin', 'men_flg_modulo', 'men_flg_ativo', 'men_num_posicao', 'men_nom_url', 'men_nom_icon', 'men_nom_path', 'men_num_nivel', 'MEN_ID_MIGRACAO', 'MEN_ID_MIGRACAO_PAI'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'men_id_men_pai', 'men_id_men');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function controleSistema()
    {
        return $this->belongsTo(ControleSistema::class, 'men_id_csi', 'csi_id_csi');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function controleMenu()
    {
        return $this->hasMany(ControleMenu::class, 'com_id_men', 'men_id_men');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupoMenus()
    {
        return $this->hasMany(GrupoMenu::class, 'grm_id_men', 'men_id_men');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarioMenus()
    {
        return $this->hasMany(UsuarioMenu::class, 'ume_id_men', 'men_id_men');
    }

    public function getControllersRoute(): array
    {
        $rotas = Route::getRoutes();

        $nomeRotasController = [];
        $arrayExcecoesNomeRotas = ['ignition']; 

        foreach($rotas as $rota){
            //UTILIZA O LIMITADOR . PARA QUEBRA DE STRING, E PEGA O PRIMEIRO INDICE REFERENTE AO CONTROLLER
            $nomeRota = explode('.', $rota->getName())[0];

            if(empty($nomeRota) || in_array($nomeRota, $arrayExcecoesNomeRotas)){  
                continue;
            }

            array_push($nomeRotasController, $nomeRota);
        }

        return array_values(array_unique($nomeRotasController));
    }


    public function getMenus(array $request = []){
        
        $conditions = [];
        $conditions[] = ['men_id_csi', '=', Parametro::selectNomParametro('ID_SISTEMA_SORAT')];

        return $this
            ->where($conditions)
            ->paginate(20);
    }

    public function cadastrarMenu(array $request = []){

        dd($request);

    }

    public function updateMenu(){

        
    }
}
