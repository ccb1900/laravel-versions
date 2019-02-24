<?php
/**
 * Created by PhpStorm.
 * User: guoji
 * Date: 2019/2/23
 * Time: 16:20
 */
namespace Ccb\Version\Repositories;
interface VersionRepositoryInterface
{
    /**
     * @param $device
     * @param $service
     * @param $version
     * @param $download_url
     * @param $description
     * @param int $is_must_update
     * @param int $last_version
     * @param string $version_alias
     * @return mixed
     */
    public function create($device,$service,$version,$download_url,$description,$is_must_update=1,$last_version=0,$version_alias="");

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

    public function getAll($limit=10);

    public function getByDeviceAndService($device,$service,$limit=10);
}