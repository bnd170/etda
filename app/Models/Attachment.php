<?php

namespace App\Models;

class Attachment extends \Orchid\Attachment\Models\Attachment
{
    public function url(?string $default = null): ?string
    {
        $path = env('CLOUDFLARE_R2_URL', '').$this->physicalPath();

        return $this->physicalPath() === null ? $default : $path;
    }
}
