<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoAfiliado
 * 
 * @property int $Id_tipo_afiliado
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property Collection|Afiliado[] $afiliados
 *
 * @package App\Models
 */
class TipoAfiliado extends Model
{
	protected $table = 'tipo_afiliado';
	protected $primaryKey = 'Id_tipo_afiliado';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function afiliados()
	{
		return $this->hasMany(Afiliado::class, 'id_tipo_afiliado');
	}
}
