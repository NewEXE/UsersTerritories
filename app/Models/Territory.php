<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Territory
 * @package App\Models
 */
class Territory extends Model
{
    /**
     * @var string Define table name
     */
    protected $table = 't_koatuu_tree';

    /**
     * @var string
     */
    protected $primaryKey = 'ter_id';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'ter_pid');
    }
}
