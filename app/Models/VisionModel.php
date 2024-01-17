<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VisionModel
 *
 * @method static Builder|VisionModel newModelQuery()
 * @method static Builder|VisionModel newQuery()
 * @method static Builder|VisionModel query()
 * @mixin Eloquent
 */
class VisionModel extends Model
{
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();

        $this->connection = config('database.vision');
    }
}
