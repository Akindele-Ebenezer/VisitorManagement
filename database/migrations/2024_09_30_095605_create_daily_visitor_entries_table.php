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
        Schema::create('daily_visitor_entries', function (Blueprint $table) {
            $table->id();
            $table->string('Name')->nullable();
            $table->string('Address')->nullable();
            $table->string('PersonnelClass')->nullable();
            $table->string('WhomToSee')->nullable();
            $table->string('SecurityStaff')->nullable();
            $table->string('CompanyVisiting')->nullable();
            $table->string('TagNumber')->nullable();
            $table->string('EntryDate')->nullable();
            $table->string('EntryTime')->nullable(); 
            $table->string('EntrySignature')->nullable();
            $table->string('ExitDate')->nullable();
            $table->string('ExitTime')->nullable();
            $table->string('ExitSignature')->nullable();
            $table->string('ApprovedBy')->nullable();
            $table->string('PhoneNumber')->nullable();
            $table->string('PurposeOfVisiting')->nullable();
            $table->string('DateIn')->nullable();
            $table->string('TimeIn')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_visitor_entries');
    }
};
