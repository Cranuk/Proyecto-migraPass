<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('aplications', function (Blueprint $table) {
            $table->renameColumn('url_application', 'url_aplication');
        });
    }

    public function down(): void
    {
        Schema::table('aplications', function (Blueprint $table) {
            $table->renameColumn('url_aplication', 'url_application');
        });
    }
};
