<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FormularioSuspencion
 * 
 * @property int $id_suspencion
 * @property int $id_formulario
 * @property int $id_suspension
 * @property string $estado
 * 
 * @property Formulario $formulario
 * @property Suspension $suspension
 *
 * @package App\Models
 */
class FormularioSuspencion extends Model
{
	protected $table = 'formulario_suspencion';
	protected $primaryKey = 'id_formulario_suspencion';
	public $timestamps = false;

	protected $casts = [
		'id_formulario' => 'int',
		'id_suspension' => 'int'
	];

	protected $fillable = [
		'id_formulario',
		'id_suspension',
		'estado'
	];

	public function formulario()
	{
		return $this->belongsTo(Formulario::class, 'id_formulario');
	}

	public function suspension()
	{
		return $this->belongsTo(Suspension::class, 'id_suspension');
	}
}
