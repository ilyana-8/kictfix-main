<?php

use App\Models\Report;
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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reporting_id');
            $table->string('title'); // Add the 'title' column
            $table->text('description'); // Add other necessary columns
            $table->string('type');
            $table->string('attachment')->nullable();
            $table->enum('status', [Report::STATUS_NOT_PROCESS_YET, Report::STATUS_IN_PROGRESS, Report::STATUS_NOT_FORWARDED, Report::STATUS_COMPLETED])->default(Report::STATUS_NOT_PROCESS_YET);
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('technician_id')->constrained('users')->onDelete('cascade')->default(2); // Set default technician_id to 2 for Technician (Not Yet Assigned)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            if (Schema::hasColumn('reports', 'user_id')) {
                $table->dropForeign(['user_id']);
            }
            if (Schema::hasColumn('reports', 'technician_id')) {
                $table->dropForeign(['technician_id']);
            }
        });

        Schema::dropIfExists('reports');
    }
};
