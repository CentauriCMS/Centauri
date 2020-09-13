<?php

use Centauri\CMS\Model\BeRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CentauriBeRoles extends Migration
{
    /**
     * Name of this table.
     * 
     * @var string
     */
    protected $table = "be_roles";

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

            $table->string("name", 100);
            $table->binary("permissions")->default(null)->nullable();
        });

        $beRole = new BeRole;
        $beRole->name = "Admin";
        $beRole->permissions = json_encode([
            1
        ]);
        $beRole->save();

        $beRole2 = new BeRole;
        $beRole2->name = "Developer";
        $beRole2->permissions = json_encode([
            2, 3, 4
        ]);
        $beRole2->save();
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
