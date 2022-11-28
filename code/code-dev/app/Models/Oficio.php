<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Oficio
 * 
 * @property int $id_oficio
 * @property string $destinatario
 * @property string $saludo
 * @property string $lugar
 * @property string $correlativo
 * @property string $clinica_servicio
 * @property Carbon $fecha
 * @property string $despedida
 * @property string $estado
 * @property int $id_usuario_creador
 * @property int $id_usuario_revisor
 * 
 * @property Usuario $usuario
 * @property Collection|OficioSuspencion[] $oficio_suspencions
 * @property Collection|Requerimiento[] $requerimientos
 * @property Collection|RevisionOficio[] $revision_oficios
 *
 * @package App\Models
 */
class Oficio extends Model
{
	protected $table = 'oficio';
	protected $primaryKey = 'id_oficio';
	public $timestamps = false;

	protected $casts = [
		'clinica_servicio' => 'int',
		'users_id_creador' => 'int',
		'users_id_revisor' => 'int',
		'id_riesgo' => 'int'
	];

	protected $dates = [
		'fecha',
		'fecha_revision'
	];

	protected $fillable = [
		'destinatario',
		'saludo',
		'lugar',
		'correlativo',
		'clinica_servicio',
		'fecha',
		'despedida',
		'estado',
		'users_id_creador',
		'users_id_revisor',
		'fecha_revision',
		'id_riesgo'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'users_id_revisor');
	}

	public function oficio_suspencions()
	{
		return $this->hasMany(OficioSuspencion::class, 'id_oficio');
	}

	public function requerimientos()
	{
		return $this->hasMany(Requerimiento::class, 'id_oficio');
	}

	public function revision_oficios()
	{
		return $this->hasMany(RevisionOficio::class, 'id_oficio');
	}
	public function clinica_servicio()
	{
		return $this->belongsTo(ClinicaServicio::class, 'clinica_servicio');
	}
}
