<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bitacora
 * 
 * @property int $id_bitacora
 * @property Carbon $fecha_hora
 * @property string $accion
 * @property string $descripcion
 *
 * @package App\Models
 */
class Bitacora extends Model
{
	protected $table = 'bitacora';
	protected $primaryKey = 'id_bitacora';
	public $timestamps = false;

	protected $dates = [
		'fecha_hora'
	];

	protected $fillable = [
		'id_usuario',
		'fecha_hora',
		'accion',
		'descripcion'
	];
}
