[![Latest Stable Version](http://poser.pugx.org/jpmschuler/filefill-payload/v)](https://packagist.org/packages/jpmschuler/filefill-payload)
[![Total Downloads](http://poser.pugx.org/jpmschuler/filefill-payload/downloads)](https://packagist.org/packages/jpmschuler/filefill-payload)
[![License](http://poser.pugx.org/jpmschuler/filefill-payload/license)](https://packagist.org/packages/jpmschuler/filefill-payload)
[![Build Status](https://github.com/jpmschuler/typo3-filefill-payload/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/jpmschuler/typo3-filefill-payload/actions/workflows/ci.yml)

[![PHP Version Require](http://poser.pugx.org/jpmschuler/filefill-payload/require/php)](https://packagist.org/packages/jpmschuler/filefill-payload)
[![TYPO3 V9](https://img.shields.io/badge/TYPO3-9-orange.svg?logo=typo3)](https://get.typo3.org/version/9)
[![TYPO3 V10](https://img.shields.io/badge/TYPO3-10-orange.svg?logo=typo3)](https://get.typo3.org/version/10)
[![TYPO3 V11](https://img.shields.io/badge/TYPO3-11-orange.svg?logo=typo3)](https://get.typo3.org/version/11)
[![TYPO3 V12](https://img.shields.io/badge/TYPO3-12-orange.svg?logo=typo3)](<[https://get.typo3.org/version/12](https://packagist.org/packages/typo3/cms-core#dev-main)>)

![Packagist](https://shields.io/packagist/v/jpmschuler/filefill-payload)

# TYPO3 EXT:filefill_payload

A TYPO3 EXT:filefill resource handler to supply working binary files.

While [EXT:filefill](https://github.com/IchHabRecht/filefill) overs a wonderful
"static" option to replace files with content, for some scenarios a correct binary
file is necessary. Especially testing file mime types and interpreting files might
be necessary, not only in regression tests (which should run on a 1:1 system copy,
but should be available on a shrunken system, too).

So this extensions supplies smallest possible binary files as an in-place
replacement for those files, while still providing a real file (e.g. videos are
playable, archives are extractable).

The file types also include legacy stuff like `.flv` or `.rm` as these are found
in actual systems.

Images are excluded from this, as they would possibly break visual regression
testing and [EXT:filefill](https://github.com/IchHabRecht/filefill) already
provides the ResourceHandler
[`placeholder.com`](https://github.com/IchHabRecht/filefill#placeholdercom).

Example Configuration (if list of extensions is empty, the default value
`7z,avi,ext,flv,mov,mp4,pdf,rar,rm,webm,zip`is used):

```php
$GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['filefill']['storages'][1] = [
    [
        'identifier' => 'staticbinaries',
        'configuration' => '7z,avi,ext,flv,mov,mp4,pdf,rar,rm,webm,zip'
    ]
];
```

|                 | URL                                                     |
| --------------- | ------------------------------------------------------- |
| **Repository:** | https://github.com/jpmschuler/typo3-filefill-payload    |
| **TER:**        | https://extensions.typo3.org/extension/filefill-payload |
