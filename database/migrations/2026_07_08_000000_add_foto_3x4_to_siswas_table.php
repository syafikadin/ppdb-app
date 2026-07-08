<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('siswas', function (Blueprint $table) {
            if (!Schema::hasColumn('siswas', 'foto_3x4')) {
                $table->string('foto_3x4')->nullable()->after('foto');
            }
        });
    }

    public function down()
    {
        Schema::table('siswas', function (Blueprint $table) {
            if (Schema::hasColumn('siswas', 'foto_3x4')) {
                $table->dropColumn('foto_3x4');
            }
        });
    }
};
