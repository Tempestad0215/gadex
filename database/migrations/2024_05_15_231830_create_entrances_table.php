<?php

use App\Models\Client;
use App\Models\Messenger;
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
        Schema::create('entrances', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignIdFor(Client::class,'client_id');
            $table->enum('document_type',[1,2]);
            $table->string('bl',75);
            $table->string('invoice',75);
            $table->string('pac_list',75);
            $table->string('other_document',255);
            $table->foreignIdFor(Messenger::class,'delivered_by');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrances');
    }
};
