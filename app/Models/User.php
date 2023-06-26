<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticableInterface;
use App\Models\Parametro;

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
 * @property UsuarioMenu[] $umeUsuarioMenus
 * @property BloqueioAcesso[] $blaBloqueioAcessosas
 */
class User extends Authenticatable implements AuthenticableInterface
{
    use HasFactory;
    /**
     * @var string
     */

    protected $table = 'usu_usuario';

    /**
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
    public function gestaoPessoa()
    {
        return $this->belongsTo(GestaoPessoa::class, 'usu_id_gpe', 'gpe_id_gpe');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'usu_id_gru', 'gru_id_gru');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pessoaFisica()
    {
        return $this->hasMany('App\PefPessoaFisica', 'pef_id_usu', 'usu_id_usu');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pessoaJuridica()
    {
        return $this->hasMany('App\PjuPessoaJuridica', 'pju_id_usu', 'usu_id_usu');
    }

    public function menu()
    {   
        return $this
            ->belongsToMany(Menu::class, 'ume_usuario_menu', 'ume_id_usu', 'ume_id_men')
            ->where('men_id_csi', '=', Parametro::selectNomParametro('ID_SISTEMA_SORAT'));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bloqueioAcesso()
    {
        return $this->hasMany('App\BlaBloqueioAcesso', 'bla_id_usu', 'usu_id_usu');
    }

    public function getUsuarios(array $request = []){

        $conditions = [];
            
        if(isset($request['usu_nom_usuario']) && !empty($request['usu_nom_usuario'])){
            $conditions[]= ['usu_nom_usuario', 'LIKE', '%'.$request['usu_nom_usuario'].'%'];
        }

        if(isset($request['usu_nom_login']) && !empty($request['usu_nom_login'])){
            $conditions[] = ['usu_nom_login', 'LIKE', '%'.$request['usu_nom_login'].'%'];
        }

        if(isset($request['grupo_id']) && !empty($request['grupo_id'])){
            $conditions[] = ['usu_id_gru', '=', $request['grupo_id']];
        }

        if(isset($request['ativo']) && $request['ativo'] != null){
            $conditions[] = ['usu_flg_ativo', '=', $request['ativo']];
        }

        return $this
            ->with('grupo')
            ->where($conditions)
            ->orderBy('usu_id_usu', 'DESC')
            ->paginate(20);
    
    }

    public function cadastrarUsuario(array $request = []){

        try{
            $this->usu_nom_usuario = $request['usu_nom_usuario'];
            $this->usu_nom_login =$request['usu_nom_login'];
            $this->usu_flg_ativo = $request['ativo'];
            $this->usu_num_senha = md5('123456');
            $this->usu_id_gru = $request['grupo_id'];

            if(!$this->save()){
                throw new Exception;
            }

            return $this;
        }catch(Exception $error){
            return false;
        }
    }

    public function updateUsuario(User $user, array $request = []){

        try{
   
            $user->usu_nom_usuario = $request['usu_nom_usuario'];
            $user->usu_nom_login = $request['usu_nom_login'];
            $user->usu_flg_ativo = $request['ativo'];
            $user->usu_num_senha = md5('123456');
            $user->usu_id_gru = $request['grupo_id'];

            if(!$user->save()){
                throw new Exception;
            }

            return $this;

        }catch(Exception $error){
            dd($error->getMessage());
            return false;
        }
    }

    public function toggleStatusUsuario(User $user, array $request = []){
        $user->usu_flg_ativo = isset($request['inativar']) ? 0 : 1; 
        return $user->save();
    }
}
