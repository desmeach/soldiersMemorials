<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Country;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enlistments', function (Blueprint $table) {
            $table->id();
            $table->string('year', 4);
            $table->string('month', 2)->nullable();
            $table->string('day', 2)->nullable();
            $table->string('region', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('distict', 50)->nullable();
            $table->foreignId('country_id')->constrained();
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
        Schema::dropIfExists('enlistments');
    }
};
