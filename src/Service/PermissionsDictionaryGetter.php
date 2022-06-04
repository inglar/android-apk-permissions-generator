<?php

declare(strict_types=1);

namespace App\Service;

use App\Dto\PermissionsDictionary;
use RuntimeException;

class PermissionsDictionaryGetter
{
    public static function get(string $filepath): PermissionsDictionary
    {
        $generalPermissions = new PermissionsDictionary();

        $content = file_get_contents($filepath);
        $xmlElement = simplexml_load_string($content);

        if (false === $xmlElement) {
            throw new RuntimeException('An error occurred while parsing '.$filepath);
        }

        $result = $xmlElement->xpath('//permission');

        foreach ($result as $item) {
            $name = (string) $item->attributes('android', true)->name;
            $protectionLevel = (string) $item->attributes('android', true)->protectionLevel;
            $protectionLevelArr = explode('|', $protectionLevel);

            if (in_array('dangerous', $protectionLevelArr)) {
                $generalPermissions->addDangerous($name);
            }

            if (in_array('privileged', $protectionLevelArr)) {
                $generalPermissions->addPrivileged($name);
            }

            if (in_array('signature', $protectionLevelArr)) {
                $generalPermissions->addSignature($name);
            }

            $generalPermissions->addAll([
                'name' => $name,
                'protectionLevel' => $protectionLevelArr,
            ]);
        }

        return $generalPermissions;
    }
}
