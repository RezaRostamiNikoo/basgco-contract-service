<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            $table->foreignId("contract_type_id")->constrained("contract_types")->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId("personnel_id")->constrained("personnel")->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId("job_id")->constrained("jobs")->restrictOnDelete()->cascadeOnUpdate();
            $table->foreignId("site_id")->constrained("sites")->restrictOnDelete()->cascadeOnUpdate();

            $table->longText("description");
            $table->string("contract_number");
            $table->string("status")->default("inactive");

            $table->timestamp("start_date")->nullable();
            $table->timestamp("finish_date")->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
