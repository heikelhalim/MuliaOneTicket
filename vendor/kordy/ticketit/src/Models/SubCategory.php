<?php

namespace Kordy\Ticketit\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'ticketit_subcategories';

    /**
     * Indicates that this model should not be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}
