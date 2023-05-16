<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string $par_nom_parametro
 * @property string $par_des_retorno
 */
class Parametro extends Model
{
    /**
     * @var string
     */
    protected $table = 'par_parametro';

    /**
     * @var string
     */
    protected $primaryKey = 'par_nom_parametro';

    /**
     * @var string
     */
    protected $keyType = 'string';

    /**
     * @var bool
     */
    public $incrementing = false;
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = ['par_des_retorno'];

    public static function selectNomParametro(string $nomeParametro): string{
        
        return self::select('par_des_retorno')
            ->where(['par_nom_parametro' => $nomeParametro])
            ->first()
            ->par_des_retorno ?? null;
    }

    public function getParametros(array $request = [])
    {   
        $conditions = [];

        if(isset($request['par_nom_parametro']) && !empty($request['par_nom_parametro'])){
            $conditions[] = ['par_nom_parametro', 'LIKE', '%'.$request['par_nom_parametro'].'%'];
        }

        return $this
            ->where($conditions)
            ->paginate(30);
    }

    public function cadastrarParametros(array $request = []){
        
        $this->par_nom_parametro = $request['par_nom_parametro'];
        $this->par_des_retorno = $request['par_des_retorno'];

        return $this->save();
    }

    public function updateParametros(Parametro $parametro, array $request = []){
            

        $parametro->par_nom_parametro = $request['par_nom_parametro'];
        $parametro->par_des_retorno = $request['par_des_retorno'];

        return $parametro->save();
    }
}
