<?php

use App\Models\Task;
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
        Schema::create('tasks', function (Blueprint $table) {
            # ezek a tábla oszlopai/sorai
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('status')->default(false);
            $table->foreignId('user_id')->constrained('users');/* ->onDelete('cascade'); */
            $table->foreignId('projects_id')->constrained('projects');
            $table->timestamps();
        });

        Task::create([
            'title' => 'Mindegy',
            'description' => 'OwO',
            'status' => true,
            'user_id' => 1,
            'projects_id' => 1

        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
