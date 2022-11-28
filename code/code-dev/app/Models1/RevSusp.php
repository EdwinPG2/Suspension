<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RevSusp
 * 
 * @property int $id_rev_susp
 * @property string|null $observacion
 * @property int $id_suspension
 * @property int $id_revision_oficio
 * 
 * @property RevisionOficio $revision_oficio
 * @property Suspension $suspension
 *
 * @package App\Models
 */
class RevSusp extends Model
{
	protected $table = 'rev_susp';
	protected $primaryKey = 'id_rev_susp';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_rev_susp' => 'int',
		'id_suspension' => 'int',
		'id_revision_oficio' => 'int'
	];

	protected $fillable = [
		'observacion',
		'id_suspension',
		'id_revision_oficio'
	];

	public function revision_oficio()
	{
		return $this->belongsTo(RevisionOficio::class, 'id_revision_oficio');
	}

	public function suspension()
	{
		return $this->belongsTo(Suspension::class, 'id_suspension');
	}
}
