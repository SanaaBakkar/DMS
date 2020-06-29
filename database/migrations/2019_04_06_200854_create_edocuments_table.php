<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEdocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edocuments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doc_name');
            $table->string('doc_prepared_by')->nullable();
            $table->string('doc_reviewed_by')->nullable();
            $table->string('doc_approved_by')->nullable();
            $table->string('doc_description')->nullable();
            $table->string('doc_status')->nullable();/*contient status */
            $table->string('authorized_users')->nullable();               
            $table->unsignedInteger('category_id')->nullable()->index();
            $table->foreign('category_id')->references('id')->on('categories');            
            $table->unsignedInteger('typdoc_id')->nullable()->index();
            $table->foreign('typdoc_id')->references('id')->on('etypdocs');
            $table->timestamps();


        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edocuments');
    }
}
