<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('team_name')->nullable();
            $table->string('team_leader_name')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->uniqid();
            $table->string('phone')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('what_uni_from')->nullable();
            $table->string('uni_id_number')->nullable();
            $table->string('uni_department')->nullable();
            $table->string('what_year_of_studires')->nullable();
            $table->string('when_are_you_expecting_graduate')->nullable();
            $table->string('how_many_member_team')->nullable();
            $table->string('second_team_member_name')->nullable();
            $table->string('second_team_member_email')->nullable();
            $table->string('second_team_member_phone')->nullable();
            $table->string('third_team_member_name')->nullable();
            $table->string('third_team_member_email')->nullable();
            $table->string('third_team_member_phone')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
