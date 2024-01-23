<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\VisionReadOnlyModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|VisionReadOnlyModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VisionReadOnlyModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|VisionReadOnlyModel query()
 * @mixin \Eloquent
 */
class VisionReadOnlyModel extends Model
{
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();

        $this->connection = config('database.vision');
    }
}
