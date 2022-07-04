<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Soldier;
use App\Models\Award;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soldier_awards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soldier_id')->constrained();
            $table->foreignId('award_id')->constrained();
            $table->string('doc_path', 50)->nullable()->default("default.jpg");
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
        Schema::dropIfExists('soldier_awards');
    }
};
