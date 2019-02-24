<?php

namespace Ccb\Version\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppVersion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "device_type",
        "service_type",
        "version",
        "in_version",
        "last_version",
        "is_must_update",
        "download_url",
        "description",
        "version_alias",
    ];
}
