<?php

use App\Enums\RoleEnum;
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
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn("users", "email")) {
                if (Schema::hasIndex("users", "email")) {
                    $table->dropIndex("email");
                    $table->dropUnique("email");
                }

                $table->dropColumn("email");
            }

            if (Schema::hasColumn("users", "email_verified_at")) {
                $table->dropColumn("email_verified_at");
            }

            if (Schema::hasColumn("users", "name")) {
                $table->renameColumn("name", "nickname");
                $table->unique("nickname");
                $table->index("nickname")->ifexis;
            }

            if (!Schema::hasColumn("users", "pontos_gea")) {
                $table->integer('pontos_gea', false, false)->nullable(false)->default(0);
            }

            if (!Schema::hasColumn("users", "role")) {
                $table->enum("role", [RoleEnum::Gestor, RoleEnum::Staff, RoleEnum::Mestre, RoleEnum::PixelArtista, RoleEnum::Arquiteto, RoleEnum::Programador]);
            }

            if (!Schema::hasColumn("users", "role")) {
                $table->boolean("active")->nullable(false)->default(true);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("active");

            $table->dropColumn("role");
            
            $table->dropColumn("pontos_gea");

            $table->dropIndex("nickname");
            $table->dropUnique("nickname");
            $table->renameColumn("nickname", "name");

            $table->timestamp('email_verified_at')->nullable();
            $table->string('email')->unique()->index();
            $table->unique("email");
        });
    }
};
