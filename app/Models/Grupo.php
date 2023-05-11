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
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'gru_grupo';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'gru_id_gru';

    /**
     * @var array
     */
    protected $fillable = ['gru_id_csi', 'gru_nom_grupo', 'gru_url_padrao'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function csiControleSistema()
    {
        return $this->belongsTo('App\CsiControleSistema', 'gru_id_csi', 'csi_id_csi');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usuUsuarios()
    {
        return $this->hasMany('App\UsuUsuario', 'usu_id_gru', 'gru_id_gru');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blaBloqueioAcessos()
    {
        return $this->hasMany('App\BlaBloqueioAcesso', 'bla_id_gru', 'gru_id_gru');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function grmGrupoMenus()
    {
        return $this->hasMany('App\GrmGrupoMenu', 'grm_id_gru', 'gru_id_gru');
    }
}
