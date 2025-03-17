<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReligionToPendaftaransTable extends Migration
{
    public function up()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->string('agama')->nullable()->after('jenis_kelamin');
        });
    }

    public function down()
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            $table->dropColumn('agama');
        });
    }
}