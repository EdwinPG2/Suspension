<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class OficioSuspencion
 * 
 * @property int $id_oficio_suspencion
 * @property int $id_oficio
 * @property int $id_suspension
 * @property string $estado
 * 
 * @property Oficio $oficio
 * @property Suspension $suspension
 *
 * @package App\Models
 */
class OficioSuspencion extends Model
{
	protected $table = 'oficio_suspencion';
	protected $primaryKey = 'id_oficio_suspencion';
	public $timestamps = false;

	protected $casts = [
		'id_oficio' => 'int',
		'id_suspension' => 'int'
	];

	protected $fillable = [
		'id_oficio',
		'id_suspension',
		'estado'
	];

	public function oficio()
	{
		return $this->belongsTo(Oficio::class, 'id_oficio');
	}

	public function suspension()
	{
		return $this->belongsTo(Suspension::class, 'id_suspension');
	}
}
