<?php

declare(strict_types=1);

namespace App\Service;

use RuntimeException;
use SimpleXMLElement;

class AppManifestParser
{
    private string $manifestFilepath;
    private ?SimpleXMLElement $xmlElement = null;

    public function __construct(string $manifestFilepath)
    {
        $this->manifestFilepath = $manifestFilepath;
    }

    public function getAppPackageName(): string
    {
        $xmlElement = $this->getXmlElement();

        return (string) $xmlElement->attributes()->package;
    }

    public function getAppPermissions(): array
    {
        $xmlElement = $this->getXmlElement();
        $result = $xmlElement->xpath('//uses-permission');

        $permissions = [];

        foreach ($result as $item) {
            $permissions[] = (string) $item->attributes('android', true)->name;
        }

        sort($permissions);

        return $permissions;
    }

    private function getXmlElement(): SimpleXMLElement
    {
        if (null === $this->xmlElement) {
            $content = file_get_contents($this->manifestFilepath);
            $this->xmlElement = simplexml_load_string($content);

            if (false === $this->xmlElement) {
                throw new RuntimeException('An error occurred while parsing '.$this->manifestFilepath);
            }
        }

        return $this->xmlElement;
    }
}
