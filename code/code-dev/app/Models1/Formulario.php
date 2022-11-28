<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Formulario
 * 
 * @property int $id_formulario
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property Collection|FormularioSuspencion[] $formulario_suspencions
 *
 * @package App\Models
 */
class Formulario extends Model
{
	protected $table = 'formulario';
	protected $primaryKey = 'id_formulario';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function formulario_suspencions()
	{
		return $this->hasMany(FormularioSuspencion::class, 'id_formulario');
	}
}
