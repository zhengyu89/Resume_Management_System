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
        Schema::create('user_resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained('users')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->text('about')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('cover_pic')->nullable();
            // Contact
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });

        Schema::create('study_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('user_educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resume_id')->constrained('user_resumes')->onDelete('cascade');
            $table->foreignId('study_field_id')->constrained('study_fields')->onDelete('cascade');
            $table->string('school_name');
            $table->string('education_level')->nullable();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->double('gpa')->nullable();
            $table->timestamps();
        });

        Schema::create('user_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resume_id')->constrained('user_resumes')->onDelete('cascade');
            $table->string('company_name');
            $table->string('position');
            $table->text('description')->nullable();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->timestamps();
        });

        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create('user_languages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resume_id')->constrained('user_resumes')->onDelete('cascade');
            $table->foreignId('language_id')->constrained('languages')->onDelete('restrict');
            $table->unique(['resume_id', 'language_id']);
            $table->timestamps();
        });

        Schema::create('user_documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resume_id')->constrained('user_resumes')->onDelete('cascade');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_educations');
        Schema::dropIfExists('study_fields');
        Schema::dropIfExists('user_work_experiences');
        Schema::dropIfExists('user_languages');
        Schema::dropIfExists('languages');
        Schema::dropIfExists('user_documents');
        Schema::dropIfExists('user_resumes');
    }
};
