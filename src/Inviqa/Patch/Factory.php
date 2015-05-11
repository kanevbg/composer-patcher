<?php

namespace Inviqa\Patch;

class Factory
{
    /**
     * @param string $patchName
     * @param string $patchGroup
     * @param array $patchDetails
     * @return Patch
     */
    public static function create($patchName, $patchGroup, array $patchDetails)
    {
        if (empty($patchDetails['type'])) {
            $patchDetails['type'] = DotPatch::TYPE;
        }

        $type = $patchDetails['type'] === DotPatch::TYPE ? 'DotPatch' : 'Shell';
        $patchClass = '\\Inviqa\\Patch\\' . $type;

        $patch = new $patchClass($patchName, $patchGroup, $patchDetails);

        return $patch;
    }
}
