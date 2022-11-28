<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Afiliado
 * 
 * @property int $no_afiliado
 * @property string $cui
 * @property string $nombre
 * @property string $apellidos
 * @property string $telefono
 * @property string|null $direccion
 * @property string|null $genero
 * @property Carbon $fecha_nacimiento
 * @property string|null $ibm
 * @property int|null $id_tipo_afiliado
 * @property int|null $id_dependencia
 * @property int|null $id_cargo
 * @property string|null $colaborador
 * 
 * @property Dependencium|null $dependencium
 * @property Cargo|null $cargo
 * @property TipoAfiliado|null $tipo_afiliado
 * @property Collection|Requerimiento[] $requerimientos
 * @property Collection|Suspension[] $suspensions
 *
 * @package App\Models
 */
class Afiliado extends Model
{
	protected $table = 'afiliado';
	protected $primaryKey = 'no_afiliado';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'no_afiliado' => 'int',
		'id_tipo_afiliado' => 'int',
		'id_dependencia' => 'int',
		'id_cargo' => 'int'
	];

	protected $dates = [
		'fecha_nacimiento'
	];

	protected $fillable = [
		'cui',
		'nombre',
		'apellidos',
		'telefono',
		'direccion',
		'genero',
		'fecha_nacimiento',
		'ibm',
		'id_tipo_afiliado',
		'id_dependencia',
		'id_cargo',
		'colaborador'
	];

	public function dependencium()
	{
		return $this->belongsTo(Dependencium::class, 'id_dependencia');
	}

	public function cargo()
	{
		return $this->belongsTo(Cargo::class, 'id_cargo');
	}

	public function tipo_afiliado()
	{
		return $this->belongsTo(TipoAfiliado::class, 'id_tipo_afiliado');
	}

	public function requerimientos()
	{
		return $this->hasMany(Requerimiento::class, 'no_afiliado');
	}

	public function suspensions()
	{
		return $this->hasMany(Suspension::class, 'no_afiliado');
	}
}
