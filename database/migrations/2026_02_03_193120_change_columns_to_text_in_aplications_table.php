<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aplications', function (Blueprint $table) {
            $table->text('password_aplication')->change();
            $table->text('url_aplication')->change();
            $table->text('notes')->change();
        });
    }

    public function down(): void
    {
        Schema::table('aplications', function (Blueprint $table) {
            $table->string('password_aplication', 255)->change();
            $table->string('url_aplication', 255)->change();
            $table->string('notes', 255)->change();
        });
    }
};
