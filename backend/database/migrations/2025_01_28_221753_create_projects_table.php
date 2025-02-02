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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_id')->unique()->default('not_set');
            $table->integer('user_id')->default(10);
            $table->string('project_name')->unique();
            $table->string('project_title');
            $table->text('project_details')->nullable();
            $table->string('project_secret');
            $table->integer('subtitles_count')->default(0);
            $table->string('storage_status')->default('inactive');
            $table->string('storage_location')->default('not_set');
            $table->string('project_status')->default('active');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE projects ADD CONSTRAINT status_check CHECK (project_status IN ('active','inactive'))");
    }


    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
