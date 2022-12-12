<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ControlRequerimiento
 * 
 * @property int $id_control_requerimiento
 * @property string $codigo_requerimiento
 * @property Carbon $fecha_registro
 * @property string $url_pdf
 * @property string|null $observacones
 * @property string $estado
 * @property int $users_id
 * 
 * @property User $user
 *
 * @package App\Models
 */
class ControlRequerimiento extends Model
{
	protected $table = 'control_requerimiento';
	protected $primaryKey = 'id_control_requerimiento';
	public $timestamps = false;

	protected $casts = [
		'users_id' => 'int'
	];

	protected $dates = [
		'fecha_registro'
	];

	protected $fillable = [
		'codigo_requerimiento',
		'fecha_registro',
		'url_pdf',
		'observacones',
		'estado',
		'users_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}
}
