<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Area
 * 
 * @property int $id_area
 * @property string $nombre
 * @property string $descripcion
 * 
 * @property Collection|ClinicaServicio[] $clinica_servicios
 *
 * @package App\Models
 */
class Area extends Model
{
	protected $table = 'area';
	protected $primaryKey = 'id_area';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'descripcion'
	];

	public function clinica_servicios()
	{
		return $this->hasMany(ClinicaServicio::class, 'id_area');
	}
}
