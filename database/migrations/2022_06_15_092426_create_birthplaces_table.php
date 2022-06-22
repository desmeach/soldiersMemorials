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
        Schema::create('birthplaces', function (Blueprint $table) {
            $table->id();
            $table->string('region', 50)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('district', 50)->nullable();
            $table->string('village', 50)->nullable();
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
        Schema::dropIfExists('birthplaces');
    }
};
