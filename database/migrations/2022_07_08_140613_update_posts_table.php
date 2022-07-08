<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

            // 1. creo la colonna della foreign key:
            $table->unsignedBigInteger('categories_id')->nullable()->after('id');

            $table->foreign('categories_id')
					->references('id')
					->on('categories')
					->onDelete('set null'); //se la elimino e alcuni elementi sono associati a quell'id, in questo modo diventa 'null'.

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {

            //1. elimino la foreign key:
            $table->dropForeign(['categories_id']);

            //2. elimino la colonna:
            $table->dropColumn('categories_id');

        });
    }
}
