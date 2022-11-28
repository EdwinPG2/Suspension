<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Especialidad
 * 
 * @property int $id_especialidad
 * @property string $nombre_especialidad
 * @property string $descripcion
 * 
 * @property Collection|ClinicaServicio[] $clinica_servicios
 * @property Collection|Medico[] $medicos
 *
 * @package App\Models
 */
class Especialidad extends Model
{
	protected $table = 'especialidad';
	protected $primaryKey = 'id_especialidad';
	public $timestamps = false;

	protected $fillable = [
		'nombre_especialidad',
		'descripcion'
	];

	public function clinica_servicios()
	{
		return $this->hasMany(ClinicaServicio::class, 'id_especialidad');
	}

	public function medicos()
	{
		return $this->hasMany(Medico::class, 'id_especialidad');
	}
}
