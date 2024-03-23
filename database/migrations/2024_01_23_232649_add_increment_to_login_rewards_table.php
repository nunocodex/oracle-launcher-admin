<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $connection = Schema::connection('oracle-vision-api');

        if (!$connection->hasColumn('login_rewards', 'id')) {
            $connection->table('login_rewards', function (Blueprint $table) {
                $table->increments('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $connection = Schema::connection('oracle-vision-api');

        if ($connection->hasColumn('login_rewards', 'id')) {
            $connection->table('login_rewards', function (Blueprint $table) {
                $table->dropColumn('id');
            });
        }
    }
};
