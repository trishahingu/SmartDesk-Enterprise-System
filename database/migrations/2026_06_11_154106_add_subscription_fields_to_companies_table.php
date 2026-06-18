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
    Schema::table('companies', function ($table) {

        $table->string('plan_type')
              ->default('Free');

        $table->integer('max_users')
              ->default(5);

        $table->integer('max_projects')
              ->default(10);

        $table->integer('storage_limit')
              ->default(100);

        $table->string('subscription_status')
              ->default('Active');

    });
}

    /**
     * Reverse the migrations.
     */
 public function down(): void
{
    Schema::table('companies', function ($table) {

        $table->dropColumn([
            'plan_type',
            'max_users',
            'max_projects',
            'storage_limit',
            'subscription_status'
        ]);

    });
}
};
