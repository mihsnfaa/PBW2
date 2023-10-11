<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 100);
            $table->string('address', 1000);
            $table->string('phoneNumber', 100);
            $table->date('birthdate')->nullable();

            $table->renameColumn('name', 'fullname');
            $table->string('email')->nullable()->change();
        });
    }
    
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
