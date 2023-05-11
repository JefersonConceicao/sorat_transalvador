<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticableInterface;
/**
 * @property int $usu_id_usu
 * @property int $usu_id_gru
 * @property int $usu_id_gpe
 * @property string $usu_nom_usuario
 * @property string $usu_nom_login
 * @property string $usu_num_senha
 * @property boolean $usu_flg_ativo
 * @property string $usu_dat_ultimo_acesso
 * @property string $usu_dat_ativacao_cadastro
 * @property string $usu_dat_reset_senha
 * @property boolean $usu_flg_reset_senha
 * @property string $usu_dat_cadastro
 * @property string $usu_cod_validacao
 * @property boolean $usu_flg_excluido
 * @property string $usu_num_tokem
 * @property string $usu_dat_tokem
 * @property GestaoPessoa $gpeGestaoPessoa
 * @property Grupo $gruGrupo
 * @property PessoaFisica[] $pefPessoaFisicas
 * @property PessoaJuridica[] $pjuPessoaJuridicas
 * @property SituacaoCaptacaoCliente[] $sccSituacaoCaptacaoClientes
 * @property UsuarioMenu[] $umeUsuarioMenus
 * @property BloqueioAcesso[] $blaBloqueioAcessos
 * @property ContratoGestao[] $ccgContratoGestaos
 * @property CaptacaoCliente[] $cclCaptacaoClientes
 * @property CarteitaCobranca[] $ccoCarteitaCobrancas
 */
class User extends Authenticatable implements AuthenticableInterface
{
    use HasFactory;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'usu_usuario';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'usu_id_usu';

    /**
     * @var array
     */
    protected $fillable = ['usu_id_gru', 'usu_id_gpe', 'usu_nom_usuario', 'usu_nom_login', 'usu_num_senha', 'usu_flg_ativo', 'usu_dat_ultimo_acesso', 'usu_dat_ativacao_cadastro', 'usu_dat_reset_senha', 'usu_flg_reset_senha', 'usu_dat_cadastro', 'usu_cod_validacao', 'usu_flg_excluido', 'usu_num_tokem', 'usu_dat_tokem'];
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gpeGestaoPessoa()
    {
        return $this->belongsTo('App\GpeGestaoPessoa', 'usu_id_gpe', 'gpe_id_gpe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gruGrupo()
    {
        return $this->belongsTo('App\GruGrupo', 'usu_id_gru', 'gru_id_gru');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pefPessoaFisicas()
    {
        return $this->hasMany('App\PefPessoaFisica', 'pef_id_usu', 'usu_id_usu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pjuPessoaJuridicas()
    {
        return $this->hasMany('App\PjuPessoaJuridica', 'pju_id_usu', 'usu_id_usu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sccSituacaoCaptacaoClientes()
    {
        return $this->hasMany('App\SccSituacaoCaptacaoCliente', 'scc_id_usu', 'usu_id_usu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function umeUsuarioMenus()
    {
        return $this->hasMany('App\UmeUsuarioMenu', 'ume_id_usu', 'usu_id_usu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blaBloqueioAcessos()
    {
        return $this->hasMany('App\BlaBloqueioAcesso', 'bla_id_usu', 'usu_id_usu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ccgContratoGestaos()
    {
        return $this->hasMany('App\CcgContratoGestao', 'ccg_id_usu', 'usu_id_usu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cclCaptacaoClientes()
    {
        return $this->hasMany('App\CclCaptacaoCliente', 'ccl_id_usu', 'usu_id_usu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ccoCarteitaCobrancas()
    {
        return $this->hasMany('App\CcoCarteitaCobranca', 'cco_id_usu', 'usu_id_usu');
    }
}
