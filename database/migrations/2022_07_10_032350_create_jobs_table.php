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
        Schema::create('jobs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->string('job_title');
            $table->integer('job_amount')->default(1);

            $table->string('company_name');
            $table->string('company_address');
            $table->string('telephone_number');

            $table->unsignedBigInteger('job_type');
            $table->foreign('job_type')->references('id')->on('job_type');

            $table->string('job_salary');
            $table->string('job_province');

            $table->enum('job_gender', [ 'm', 'f' ] );

            $table->unsignedBigInteger('job_degree');
            $table->foreign('job_degree')->references('id')->on('job_degree');

            $table->string('job_description');


            $table->dateTime('expired_at')->nullable();

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
        Schema::dropIfExists('jobs');
    }
};
