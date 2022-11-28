<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Requerimiento
 * 
 * @property int $id_requerimiento
 * @property string $no_requerimiento
 * @property Carbon $fecha_requerimiento
 * @property Carbon $fecha_envio
 * @property string $estado
 * @property string|null $observaciones
 * @property Carbon|null $fecha_recepcion_regmed
 * @property int $id_oficio
 * @property int $no_afiliado
 * @property int $users_id_remitente
 * @property int|null $users_id_responsable
 * 
 * @property Afiliado $afiliado
 * @property Oficio $oficio
 * @property User|null $user
 *
 * @package App\Models
 */
class Requerimiento extends Model
{
	protected $table = 'requerimiento';
	protected $primaryKey = 'id_requerimiento';
	public $timestamps = false;

	protected $casts = [
		'id_oficio' => 'int',
		'no_afiliado' => 'int',
		'users_id_remitente' => 'int',
		'users_id_responsable' => 'int'
	];

	protected $dates = [
		'fecha_requerimiento',
		'fecha_envio',
		'fecha_recepcion_regmed'
	];

	protected $fillable = [
		'no_requerimiento',
		'fecha_requerimiento',
		'fecha_envio',
		'estado',
		'observaciones',
		'fecha_recepcion_regmed',
		'id_oficio',
		'no_afiliado',
		'users_id_remitente',
		'users_id_responsable'
	];

	public function afiliado()
	{
		return $this->belongsTo(Afiliado::class, 'no_afiliado');
	}

	public function oficio()
	{
		return $this->belongsTo(Oficio::class, 'id_oficio');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id_responsable');
	}
}
