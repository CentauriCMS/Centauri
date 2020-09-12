<?php

use Centauri\CMS\Model\BeUser;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CentauriBeUsers extends Migration
{
    /**
     * Name of this table.
     * 
     * @var string
     */
    protected $table = "be_users";

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function(Blueprint $table) {
            $table->increments("uid");

            $table->timestamps();
            $table->softDeletes();

            $table->tinyInteger("hidden")->default(0);

            $table->string("email", 100);
            $table->string("firstname", 100);
            $table->string("lastname", 100);
            $table->string("username", 100);
            $table->string("password");
            $table->binary("roles")->default(null)->nullable();
        });

        $beUser = new BeUser;

        $beUser->email = "my@mail.com";
        $beUser->firstname = "John";
        $beUser->lastname = "Doe";
        $beUser->username = "admin";
        $beUser->password = "password";
        $beUser->roles = json_encode([
            "admin"
        ]);

        $beUser->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
