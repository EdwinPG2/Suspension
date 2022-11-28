<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bitacora4
 * 
 * @property int $id_bitacora4
 * @property Carbon $fecha_hora
 * @property string $accion
 * @property string $descripcion
 *
 * @package App\Models
 */
class Bitacora4 extends Model
{
	protected $table = 'bitacora4';
	protected $primaryKey = 'id_bitacora4';
	public $timestamps = false;

	protected $dates = [
		'fecha_hora'
	];

	protected $fillable = [
		'fecha_hora',
		'accion',
		'descripcion'
	];
}
