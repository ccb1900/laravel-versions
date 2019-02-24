<?php
/**
 * Created by PhpStorm.
 * User: guoji
 * Date: 2019/2/23
 * Time: 16:20
 */
namespace Ccb\Version\Repositories;
use Ccb\Version\Models\AppVersion;

class VersionRepository implements VersionRepositoryInterface
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
    public function create($device, $service, $version, $download_url, $description, $is_must_update = 1,$last_version=0,  $version_alias = "")
    {
        $in_version = date(config("version.format"));

        AppVersion::query()->create([
            "device_type"=>$device,
            "service_type"=>$service,
            "version"=>$version,
            "in_version"=>$in_version,
            "last_version"=>$last_version,
            "is_must_update"=>$is_must_update,
            "download_url"=>$download_url,
            "description"=>$description,
            "version_alias"=>$version_alias,
        ]);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function delete($id)
    {
        $version = AppVersion::query()->findOrFail($id);

        $version->delete();
    }

    /**
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAll($limit = 10)
    {
        return AppVersion::query()->paginate($limit);
    }

    /**
     * @param $device
     * @param $service
     * @param int $limit
     * @param array $fields
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getByDeviceAndService($device, $service, $limit = 10,$fields = [])
    {
        return AppVersion::query()
            ->select($fields)
            ->where("device_type",$device)
            ->where("service_type",$service)
            ->orderByDesc("created_at")
            ->paginate($limit);
    }
}