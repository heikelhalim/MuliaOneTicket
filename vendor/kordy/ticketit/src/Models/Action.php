<?php

namespace Kordy\Ticketit\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'ticketit_action';

    protected $fillable = [ 'name'];

    /**
     * Indicates that this model should not be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get related tickets.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany('Kordy\Ticketit\Models\Ticket', 'action_id');
    }
}
