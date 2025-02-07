<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sport_properties', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Property name ---> "Matches Played"
            $table->string('input_type');
            /* data types for property can be: */
            /*  date  --> تاريخ آخر مباراة لعبها اللاعب
             *  datetime --> توقيت تسجيل النقطة الأخيرة في المباراة
             *  float --> تقييم اللاعب
             ****/
            $table->enum('type', ['individual', 'team']);
            $table->foreignId('sport_id')->constrained('sport_types')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sport_properties');
    }
};
