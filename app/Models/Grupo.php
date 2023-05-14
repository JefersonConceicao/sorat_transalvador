<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $gru_id_gru
 * @property int $gru_id_csi
 * @property string $gru_nom_grupo
 * @property string $gru_url_padrao
 * @property ControleSistema $controleSistema
 * @property Usuario[] $usuarios
 * @property BloqueioAcesso[] $bloqueioAcessos
 * @property GrupoMenu[] $grupoMenus
 */
class Grupo extends Model
{
    /**
     * @var string
     */
    protected $table = 'gru_grupo';

    /**
     * @var string
     */
    protected $primaryKey = 'gru_id_gru';

    /**
     * @var array
     */
    protected $fillable = ['gru_id_csi', 'gru_nom_grupo', 'gru_url_padrao'];
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function controleSistema()
    {
        return $this->belongsTo('App\CsiControleSistema', 'gru_id_csi', 'csi_id_csi');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuarios()
    {
        return $this->hasMany('App\UsuUsuario', 'usu_id_gru', 'gru_id_gru');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bloqueioAcesso()
    {
        return $this->hasMany('App\BlaBloqueioAcesso', 'bla_id_gru', 'gru_id_gru');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grupoMenu()
    {
        return $this->hasMany('App\GrmGrupoMenu', 'grm_id_gru', 'gru_id_gru');
    }

    public function getGrupos(array $request = []){

        $conditions = [];

        if(isset($request['nom_grupo']) && !empty($request['nom_grupo'])){
            $conditions[] = ['gru_nom_grupo', 'LIKE', '%'.$request['nom_grupo'].'%'];
        }

        return $this
            ->where($conditions);
    }

    public static function optionsGrupos(){
        return self::pluck('gru_nom_grupo', 'gru_id_gru')->toArray();
    }
}
