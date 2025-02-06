<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    /*
     * table users need team table first for teamid
       team  table need table users  first for captain_id and coach_id

           **** Circular Dependency ****

       solution::
                =====> *) Allow NULL Values in Foreign Keys Initially ==> "approach used"
                          (1) Create users and teams without foreign keys first.
                          (2) add foreign keys in another migration after both tables exist.

    */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('sport_type_id')->constrained('sport_types')->onDelete('cascade');
            /*$table->foreignId('coach_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('captain_id')->nullable()->constrained('users')->onDelete('set null');*/
            $table->enum('status', ['active', 'inactive']);
            $table->integer('players_limit');
            $table->softDeletes(); // to save historical data for this team
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
