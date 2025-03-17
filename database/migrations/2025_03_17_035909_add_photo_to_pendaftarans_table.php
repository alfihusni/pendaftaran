<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotoToPendaftaransTable extends Migration
{
    public function up()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->string('foto')->nullable()->after('agama'); // Tambahkan kolom foto
        });
    }

    public function down()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropColumn('foto'); // Hapus kolom foto jika rollback
        });
    }
}