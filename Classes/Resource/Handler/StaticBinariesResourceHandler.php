<?php

namespace Jpmschuler\FilefillPayload\Resource\Handler;

use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3\CMS\Core\TypoScript\Parser\TypoScriptParser;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class StaticBinariesResourceHandler implements \IchHabRecht\Filefill\Resource\RemoteResourceInterface
{
    protected $configuration;

    protected $handledExtList = [];

    protected const AVAILABLE_EXT_LIST = ['7z', 'avi', 'ext', 'flv', 'mov', 'mp4', 'pdf', 'rar', 'rm', 'webm', 'zip'];
    protected const PATH_PREFIX = 'EXT:filefill_payload/Resources/Public/Payload/example';

    public function __construct($configuration)
    {
       if (!$configuration) {
           $this->handledExtList = self::AVAILABLE_EXT_LIST;
       }
       else {
           $this->handledExtList = $configuration;
       }
    }

    public function hasFile($fileIdentifier, $filePath, FileInterface $fileObject = null)
    {
        $fileInfo = pathinfo($fileIdentifier);
        if (in_array($fileInfo['extension'], $this->handledExtList, true)) {
            return true;
        }
        return false;
    }

    public function getFile($fileIdentifier, $filePath, FileInterface $fileObject = null)
    {
        $fileInfo = pathinfo($fileIdentifier);
        if (in_array($fileInfo['extension'], $this->handledExtList, true)) {
            return file_get_contents(GeneralUtility::getFileAbsFileName(self::PATH_PREFIX . '.' . $fileInfo['extension']));
        }
        return '';
    }
}
