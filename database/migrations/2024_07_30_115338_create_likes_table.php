<?php

use App\Models\Reply;
use App\Models\Tip;
use App\Models\User;
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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();

            $table -> foreignIdFor(User::class) -> constrained() -> cascadeOnDelete();
            $table -> foreignIdFor(Tip::class) -> nullable() -> constrained()  -> cascadeOnDelete();
            $table -> foreignIdFor(Reply::class) -> nullable() -> constrained() -> cascadeOnDelete();

            $table -> string('ind');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
