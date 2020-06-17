<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stars', function (Blueprint $table) {
            $table->id();
            // Name
            $table->string('name');
            $table->string('name_y');
            $table->string('name_r');
            $table->integer('name_separate');
            $table->integer('name_y_separate');
            $table->integer('name_r_separate');
            $table->integer('name_r_separate_secondary')->nullable(); // 中国語名用
            // Birthday
            $table->date('birthday')->nullable();
            // CV
            $table->string('cv')->nullable();
            // School
            $table->string('school')->nullable();
            $table->string('department')->nullable();
            $table->integer('grade')->nullable();
            $table->integer('class_no')->nullable();
            // Activity : Favorite & Not good
            $table->string('act_like')->nullable();
            $table->string('act_not_good')->nullable();
            // Food     : Like & Dislike
            $table->string('food_like')->nullable();
            $table->string('food_dislike')->nullable();
            // Weapon
            $table->string('weapon_name')->nullable();
            $table->string('weapon_category')->nullable();
            // Document (as Markdown)
            $table->longText('document');
            // Color
            $table->string('color', 7);
            // Metadata
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
        Schema::dropIfExists('stars');
    }
}
