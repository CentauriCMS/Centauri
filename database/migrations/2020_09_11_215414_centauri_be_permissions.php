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
        });

        $bePermission = new BePermission;
        $bePermission->identifier = "admin";
        $bePermission->is_admin = 1;
        $bePermission->save();

        $permissions = [
            "PAGES_CREATE",
            "PAGES_EDIT",
            "PAGES_DELETE"
        ];

        foreach($permissions as $permission) {
            $bePerm = new BePermission;
            $bePerm->identifier = $permission;
            $bePerm->save();
        }
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
