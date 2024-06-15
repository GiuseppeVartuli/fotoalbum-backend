<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            // inserimento della nuova colonna
            $table->unsignedBigInteger('album_id')->nullable()->after('id');
            $table->foreign('album_id')->references('id')->on('albums');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('photos', function (Blueprint $table) {
            // distruggiamo i legami
            $table->dropForeign('photos_album_id_foreign');
            $table->dropColumn('album_id');
        });
    }
};
