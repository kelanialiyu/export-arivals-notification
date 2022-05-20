<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('container_infos', function (Blueprint $table) {
            $table->id();
            $table->foreignId("export_id");
            $table->foreignId("iso_id");
            $table->foreignId("operator_id");
            $table->decimal("vgm",8,2);
            $table->string("container_no");
            $table->string("booking_no");
            $table->string("vessel");
            $table->string("port_of_discharge");
            $table->string("commodity");
            $table->string("shipper");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('container_infos');
    }
};
