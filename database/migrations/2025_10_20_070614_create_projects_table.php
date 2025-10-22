<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 'projects' adalah nama tabel (konvensinya plural dari model 'Project')
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            
            // Kolom Anda:
            // Ini cara terbaik membuat foreign key untuk 'user_id'
            $table->foreignId('user_id')
                  ->constrained() // Mengacu ke tabel 'users' kolom 'id'
                  ->onDelete('cascade'); // Jika user dihapus, proyeknya juga terhapus

            $table->string('name');
            $table->text('description')->nullable();
            $table->string('status')->default('active'); // default('active') adalah ide bagus
            $table->date('due_date')->nullable();
            
            $table->timestamps(); // Membuat created_at dan updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
