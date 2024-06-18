<?php

namespace Jpmschuler\FilefillPayload\Resource\Handler;

use IchHabRecht\Filefill\Resource\RemoteResourceInterface;
use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class StaticBinariesResourceHandler implements RemoteResourceInterface
{
    protected $handledExtList = [];

    protected const AVAILABLE_EXT_LIST = ['7z', 'avi', 'ext', 'flv', 'mov', 'mp4', 'pdf', 'rar', 'rm', 'webm', 'zip'];
    protected const PATH_PREFIX = 'EXT:filefill_payload/Resources/Public/Payload/example';

    public function __construct($configuration)
    {
        if (!$configuration) {
            $this->handledExtList = self::AVAILABLE_EXT_LIST;
        } elseif (!is_array($configuration) && strpos($configuration, ',')) {
            $this->handledExtList = explode(',', $configuration);
        } else {
            $this->handledExtList = $configuration;
        }
    }

    /**
     * @param string $fileIdentifier
     * @param string $filePath
     * @param FileInterface|null $fileObject
     * @return bool
     */
    public function hasFile($fileIdentifier, $filePath, FileInterface $fileObject = null)
    {
        $fileInfo = pathinfo($fileIdentifier);
        if (isset($fileInfo['extension']) && in_array($fileInfo['extension'], $this->handledExtList, true)) {
            return true;
        }
        return false;
    }

    /**
     * @param string $fileIdentifier
     * @param string $filePath
     * @param FileInterface|null $fileObject
     * @return resource|string
     */
    public function getFile($fileIdentifier, $filePath, FileInterface $fileObject = null)
    {
        $fileInfo = pathinfo($fileIdentifier);
        if (in_array($fileInfo['extension'], $this->handledExtList, true)) {
            return file_get_contents(
                GeneralUtility::getFileAbsFileName(self::PATH_PREFIX . '.' . $fileInfo['extension'])
            );
        }
        return '';
    }
}
