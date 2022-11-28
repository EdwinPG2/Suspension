<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RevisionOficio
 * 
 * @property int $id_revision_oficio
 * @property Carbon $fecha_rev
 * @property int $id_oficio
 * @property int $users_id
 * 
 * @property Oficio $oficio
 * @property User $user
 * @property Collection|RevSusp[] $rev_susps
 *
 * @package App\Models
 */
class RevisionOficio extends Model
{
	protected $table = 'revision_oficio';
	protected $primaryKey = 'id_revision_oficio';
	public $timestamps = false;

	protected $casts = [
		'id_oficio' => 'int',
		'users_id' => 'int'
	];

	protected $dates = [
		'fecha_rev'
	];

	protected $fillable = [
		'fecha_rev',
		'id_oficio',
		'users_id'
	];

	public function oficio()
	{
		return $this->belongsTo(Oficio::class, 'id_oficio');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'users_id');
	}

	public function rev_susps()
	{
		return $this->hasMany(RevSusp::class, 'id_revision_oficio');
	}
}
