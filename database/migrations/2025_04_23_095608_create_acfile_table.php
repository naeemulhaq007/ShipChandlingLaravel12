<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('acfile', function (Blueprint $table) {
            $table->string('ActCode')->primary();
            $table->string('AcName3')->nullable();
            $table->integer('BranchCode');
            $table->integer('AcCode1')->nullable();
            $table->integer('AcCode2')->nullable();
            $table->integer('AcCode3')->nullable();
            $table->integer('ACode1')->nullable();
            $table->integer('ACode2')->nullable();
            $table->integer('ACode3')->nullable();
            $table->integer('ACode4')->nullable();
            $table->integer('ACode5')->nullable();
            $table->integer('ACode6')->nullable();
            $table->integer('ACode7')->nullable();
            $table->integer('ACode8')->nullable();
            $table->integer('ACode9')->nullable();
            $table->integer('ACode10')->nullable();
            $table->tinyInteger('AcLevel')->nullable();
            $table->string('TitleLevel1')->nullable();
            $table->string('TitleLevel2')->nullable();
            $table->boolean('ChkCustomer')->default(false);
            $table->boolean('ChkExpence')->default(false);
            $table->boolean('ChkRecAC')->default(false);
            $table->boolean('ChkLabour')->default(false);
            $table->boolean('ChkInactive')->default(false);
            $table->string('OptType')->nullable();
            $table->boolean('ChkSupplier')->default(false);
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acfile');
    }
};