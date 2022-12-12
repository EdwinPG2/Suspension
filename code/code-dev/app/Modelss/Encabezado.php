<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Encabezado
 * 
 * @property string $nombre_destinatario
 * @property string $saludo
 * @property string $lugar
 * @property string $despedida
 *
 * @package App\Models
 */
class Encabezado extends Model
{
	protected $table = 'encabezado';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'nombre_destinatario',
		'saludo',
		'lugar',
		'despedida'
	];
}
