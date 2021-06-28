<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->decimal('subtotal');
            $table->decimal('discount');
            $table->decimal('tax');
            $table->decimal('total');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('other_phone')->nullable();
            $table->string('location');
            $table->string('country')->default('Kenya');
            $table->enum('status', ['ordered','delivered','cancelled'])->default('ordered');
            $table->boolean('is_shipping_different')->default(false);
            $table->text('special_instructions')->nullable();
            $table->date('ready_by')->default(DB::raw('CURRENT_DATE'));
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('orders');
    }
}
