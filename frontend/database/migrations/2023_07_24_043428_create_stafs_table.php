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
        Schema::create('staf', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nip');
            $table->string('nama')->nullable();
            $table->boolean('jenis_kelamin');
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
            $table->integer('id_divisi');
            $table->foreign('id_divisi')
            ->references('id')
            ->on('divisi')
            ->restrictOnDelete()
            ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void    {
        
        Schema::dropIfExists('staf');

    }
};
