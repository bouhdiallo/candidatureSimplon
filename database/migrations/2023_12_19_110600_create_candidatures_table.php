<?php

use App\Models\User;
use App\Models\Formation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidatures', function (Blueprint $table) {
            $table->id();
            $table->enum('statut',['accepter','refuser'])->default('accepter');
            $table->date('date_candidature');
            $table->foreignIdFor(User::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Formation::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatures');
    }
};
