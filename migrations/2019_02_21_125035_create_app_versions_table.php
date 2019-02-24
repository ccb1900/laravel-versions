<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_versions', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger("device_type")->comment("设备类型 1 安卓 2 ios 3 微信小程序");
            $table->tinyInteger("service_type")->comment("业务类型 1 宠记 2 伴宠 ");
            $table->string("version")->comment("外部版本号1.1.0(标准版本号，也方便比较)");
            $table->integer("in_version")->comment("内部版本号201901081234/年月日时分秒");
            $table->integer("last_version")->comment("上一个内部版本号201901081234/年月日时分秒");
            $table->tinyInteger("is_must_update")->default(1)->comment("1 强制 2 不强制");
            $table->string("download_url")->default('')->comment("下载地址");
            $table->string("description")->default('')->comment("更新说明");
            $table->string("version_alias")->default("")->comment("版本别名 牧羊犬 波斯猫等");
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
        Schema::dropIfExists('app_versions');
    }
}
