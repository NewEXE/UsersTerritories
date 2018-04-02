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
     * @param $query
     * @return mixed
     */
    public function scopeRegions($query)
    {
        return $query->where('ter_level', '1');
    }

    /**
     * @param $query
     * @param Territory $territory
     * @return mixed
     */
    public function scopeDistricts($query, Territory $territory)
    {
        return $query
            ->where('ter_pid', $territory->getKey())
            ->where('ter_level', '2');
    }

    /**
     * @param $query
     * @param Territory $territory
     * @return mixed
     */
    public function scopeCities($query, Territory $territory)
    {
        return $query
            ->where('ter_pid', $territory->getKey())
            ->where('ter_level', '>', '2');
    }
}
