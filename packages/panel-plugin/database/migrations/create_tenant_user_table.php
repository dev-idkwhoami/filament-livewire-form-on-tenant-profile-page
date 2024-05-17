<?php

use DevIdkwhoami\PanelPlugin\Models\Tenant;
use DevIdkwhoami\PanelPlugin\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tenant_user', function (Blueprint $table) {
            $table->foreignIdFor(Tenant::class)->nullable();
            $table->foreignIdFor(User::class)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenant_user');
    }
};
