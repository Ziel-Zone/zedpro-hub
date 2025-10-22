<?php
// File: app/Models/Project.php

namespace App\Models;

// 'use ... Log;' sudah dihapus karena tidak perlu

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    /**
     * Properti $fillable (Keamanan)
     * Kolom mana saja yang boleh diisi secara massal.
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'type',
    ];

    /**
     * Properti $casts (Konversi Tipe Data)
     * Mengubah tipe data agar lebih mudah dikelola di PHP.
     */
    protected $casts = [
        // Baris 'due_date' => 'date' dihapus 
        // karena tidak ada di migrasi 'projects'
    ];

    
    // ===================================================
    // RELASI ANDA
    // ===================================================

    /**
     * Relasi: Proyek ini dimiliki oleh satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi: Proyek ini memiliki banyak Task.
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    /**
     * Relasi: Proyek ini memiliki banyak Milestone.
     */
    public function milestones(): HasMany
    {
        return $this->hasMany(Milestone::class);
    }

    /**
     * Relasi: Proyek ini memiliki banyak LogEntry.
     * (Nama diubah dari journalEntries menjadi logEntries agar konsisten)
     */
    public function logEntries(): HasMany
    {
        return $this->hasMany(LogEntry::class);
    }
}
