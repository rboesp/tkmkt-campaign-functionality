<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('inventory_csv_id')->constrained('inventory_csvs')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreignId('template_id')->constrained('templates')->onDelete('cascade')->onUpdate('cascade');
            // $table->string('status')->nullable();
            // $table->string('stock')->nullable();
            // $table->string('vin')->nullable();
            // $table->string('year')->nullable();
            $table->string('make')->nullable();
            $table->string('model')->nullable();
            $table->string('text')->nullable();            
            $table->string('background_img')->nullable();
            $table->string('logo_img')->nullable();
            // $table->string('type')->nullable();
            // $table->string('trim')->nullable();
            // $table->string('model_number')->nullable();
            // $table->string('seats')->nullable();
            // $table->string('exterior_color')->nullable();
            // $table->string('interior_color')->nullable();
            // $table->tinyInteger('source')->default(0)->comment('0 = CSV, 1 = XML');
            $table->softDeletes();
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
        Schema::dropIfExists('inventory');
    }
};
