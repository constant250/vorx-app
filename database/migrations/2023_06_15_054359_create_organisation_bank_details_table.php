<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_bank_details', function (Blueprint $table) {
            $table->id();
            $table->integer('organisation_id');
            $table->string('bank_name');
            $table->string('bsb');
            $table->string('account_name');
            $table->string('account_number');
            $table->string('branch_address')->nullable();
            $table->string('swift_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_bank_details');
    }
};
