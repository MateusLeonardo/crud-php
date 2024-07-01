<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            if(!Schema::hasColumn('produtos', 'categoria_id')) {
            $table->unsignedBigInteger('categoria_id')->nullable()->after('id');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            };
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            if (Schema::hasColumn('produtos', 'categoria_id')) {
            $table->dropForeign(['categoria_id']);
            $table->dropColumn('categoria_id');
            };
        });
    }
};
