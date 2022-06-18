<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Status;
use App\Models\Retire;
use App\Models\Rank;
use App\Models\MilitaryUnit;
use App\Models\Enlistment;
use App\Models\Birthplace;
use App\Models\Memorial;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldiers', function (Blueprint $table) {
            $table->id();
            $table->string('photo', 30)->nullable();
            $table->string('surname', 30);
            $table->string('name', 30)->nullable();
            $table->string('middle_name', 30)->nullable();
            $table->string('birth_year', 4);
            $table->string('birth_month', 2)->nullable();
            $table->string('birth_day', 2)->nullable();
            $table->foreignId('status_id')->constrained();
            $table->foreignId('retire_id')->constrained();
            $table->foreignId('rank_id')->constrained();
            $table->foreignId('military_unit_id')->constrained();
            $table->foreignId('enlistment_id')->constrained();
            $table->foreignId('birthplace_id')->constrained();
            $table->foreignId('memorial_id')->constrained();
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
        Schema::dropIfExists('soldiers');
    }
};
