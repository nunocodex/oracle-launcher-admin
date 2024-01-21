<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisionReadOnlyModel extends Model
{
    public $timestamps = false;

    public function __construct()
    {
        parent::__construct();

        $this->connection = config('database.vision');
    }
}
