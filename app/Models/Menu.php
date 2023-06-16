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
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function menu()
    {
        return $this->hasMany(Menu::class, 'men_id_men_pai', 'men_id_men');
    }

    public function menuPai(){
        return $this->hasOne(Menu::class, 'men_id_men', 'men_id_men_pai');
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

    public function getOptionsMenu($conditions = [])
    {
        $data = $this->where([['men_id_csi', '=', Parametro::selectNomParametro('ID_SISTEMA_SORAT')]]);
        
        if(!empty($conditions)){
            $data->where([$conditions]);
        }

        $dados = $data->pluck('men_nom_menu', 'men_id_men')->toArray();

        return $dados;
    }

    public static function getMenusForSidebar()
    {
        return self::where([
            ['men_id_men_pai', '=', NULL],
            ['men_id_csi', '=', Parametro::selectNomParametro('ID_SISTEMA_SORAT')],
        ])
        ->with('menu')
        ->get();
    }

    public static function getMenus(array $request = []){
        
        $conditions = [];
        $conditions[] = ['men_id_csi', '=', Parametro::selectNomParametro('ID_SISTEMA_SORAT')];

        if(isset($request['nome_menu']) && !empty($request['nome_menu'])){
            $conditions[] = ['men_nom_menu', 'LIKE', '%'.$request['nome_menu'].'%'];
        }

        if(isset($request['controller_id']) && !empty($request['controller_id'])){
            $conditions[] = ['men_nom_controller', '=', $request['controller_id']];
        }

        if(isset($request['nom_action']) && !empty($request['nom_action'])){
            $conditions[] = ['men_nom_action', 'LIKE', '%'.$request['nom_action'].'%'];
        }

        if(isset($request['menu_visitante']) && $request['menu_visitante'] != ""){
            $conditions[] = ['men_flg_menu_guest', '=', $request['menu_visitante']];
        }
        
        if(isset($request['menu_administrativo']) && $request['menu_administrativo'] !== ""){
            $conditions[] = ['men_flg_menu_admin', '=', $request['menu_administrativo']];
        }

        if(isset($request['ativo']) && $request['ativo'] !== ""){
            $conditions[] = ['men_flg_ativo', '=', $request['ativo']];
        }

        return self::where($conditions)->with('menuPai')->paginate(20);
    }

    public function cadastrarMenu(array $request = []){

        try{
            $this->men_nom_menu =       $request['men_nom_menu'];
            $this->men_nom_action =     isset($request['nome_action']) ? $request['nome_action'] : null;
            $this->men_htm_icon =       $request['icon'] ?? null;
            $this->men_nom_controller = isset($request['men_nom_controller']) ? $request['men_nom_controller'] : null;

            $this->men_flg_menu_guest = isset($request['flg_menu_visitante']) ? 1 : 0 ;
            $this->men_flg_menu_admin = isset($request['flg_menu_admin']) ? 1 :  0;
            $this->men_flg_modulo =     isset($request['flg_menu_modulo']) ? 1 : 0;
            $this->men_flg_ativo =      isset($request['flg_menu_ativo']) ? 1 : 0;
            $this->men_id_men_pai =     isset($request['menu_pai_id']) ? $request['menu_pai_id'] : null;

            $this->men_id_csi =         Parametro::selectNomParametro('ID_SISTEMA_SORAT');
            $this->men_num_posicao = 0;
            
            if(isset($request['menu_pai_id']) && $request['menu_pai_id'] == 1){
                $this->men_id_men_pai = $request['menu_pai_id'];
            }

            if(!$this->save()){
                throw new Exception();
            }

            return true;
        }catch(Exception $error){
            return false;
        }
    }

    public function updateMenu(Menu $menu, array $request = []){

        try{
            $menu->men_nom_menu =       $request['men_nom_menu'];
            $menu->men_nom_action =     isset($request['nome_action']) ? $request['nome_action'] : null;
            $menu->men_htm_icon =       $request['icon'] ?? null;
            $menu->men_nom_controller = isset($request['men_nom_controller']) ? $request['men_nom_controller'] : null;

            $menu->men_flg_menu_guest = isset($request['flg_menu_visitante']) ? 1 : 0 ;
            $menu->men_flg_menu_admin = isset($request['flg_menu_admin']) ? 1 :  0;
            $menu->men_flg_modulo =     isset($request['flg_menu_modulo']) ? 1 : 0;
            $menu->men_flg_ativo =      isset($request['flg_menu_ativo']) ? 1 : 0;
            $menu->men_id_men_pai =     isset($request['menu_pai_id']) ? $request['menu_pai_id'] : null;

            $menu->men_id_csi =         Parametro::selectNomParametro('ID_SISTEMA_SORAT');
            $menu->men_num_posicao = 0;
            
            if(isset($request['menu_pai_id']) && $request['menu_pai_id'] == 1){
                $menu->men_id_men_pai = $request['menu_pai_id'];
            }

            if(!$menu->save()){
                throw new Exception();
            }
            
            return $menu;
        }catch(\Exception $error){
            return false;
        }
    }
}
