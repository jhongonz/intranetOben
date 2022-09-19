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
        if (!Schema::hasTable('app_employees')) {

            Schema::create('app_employees', function (Blueprint $table) {

                $table->engine = 'InnoDB';
                $table->charset = 'utf8';
                $table->collation = 'utf8_general_ci';

                $table->bigIncrements('emp_id');
                $table->string('emp_number_identification', 50)->nullable();
                $table->string('emp_type_identification', 20)->nullable();
                $table->string('emp_name', 100);
                $table->string('emp_lastname', 100)->nullable();
                $table->string('emp_phone', 25)->nullable();
                $table->string('emp_email', 150);
                $table->string('emp_address', 250)->nullable();
                $table->string('emp_observations', 250)->nullable();
                $table->text('emp_search')->nullable();
                $table->tinyInteger('emp_status')->default(1);
                $table->datetime('emp_created_at')->nullable();
                $table->datetime('emp_updated_at')->nullable();
                $table->softDeletes('emp_deleted_at');

                $table->timestamps();
            });

            DB::statement("ALTER TABLE app_employees AUTO_INCREMENT = 1;");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_employees');
    }
};
