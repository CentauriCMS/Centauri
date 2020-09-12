<?php

use Centauri\CMS\Model\BePermission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CentauriBePermissions extends Migration
{
    /**
     * Name of this table.
     * 
     * @var string
     */
    protected $table = "be_permissions";

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

            $table->string("identifier", 100);
            $table->tinyInteger("is_admin")->default(0);
            $table->integer("parent_uid");
        });

        $beRole = new BePermission;

        $beRole->identifier = "admin";
        $beRole->is_admin = 1;
        $beRole->parent_uid = 1;

        $beRole->save();
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
