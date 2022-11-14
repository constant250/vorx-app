<?php

use App\Models\Schema\SchemaBuilder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('trxn_type');
            $table->string('trxn_code');
            $table->dateTime('trxn_datetime');
            $table->integer('customer_id');
            $table->string('title')->nullable();
            $table->decimal('amount', 11,2)->default(0);
            $table->longText('trxn_details')->nullable();
            $table->text('remarks');
            $table->integer('status');
            SchemaBuilder::BelongsToUserSchemaUp($table);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
