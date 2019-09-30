<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 10)->unique();
            $table->string('name', 100);
            $table->decimal('dollarSalary', 15, 2);
            $table->decimal('pesosSalary', 15, 2);
            $table->string('address', 100);
            $table->string('state', 50);
            $table->string('city', 50);
            $table->string('telephone', 10);
            $table->string('email');
            $table->enum('active', ['0', '1'])->default('1');
            $table->enum('delete', ['0', '1'])->default('0');
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
        Schema::dropIfExists('staff');
    }
}
