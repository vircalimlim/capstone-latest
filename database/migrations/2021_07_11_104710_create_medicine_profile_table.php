<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_profile', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicine_id');
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->text('concern');
            $table->unsignedBigInteger('quantity');
            $table->date('date_released');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine_profile');
    }
}
