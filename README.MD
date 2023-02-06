TYPO3 EXT:filefill resource handler to supply working binary files
==

A ResourceHandler for EXT:filefill - see
https://github.com/IchHabRecht/filefill#additional-resources

While EXT:filefill overs a wonderful "static" option to replace files with content,
for some scenarios a correct binary file is necessary. Especially testing file mime
types and interpreting files might be necessary, not only in regression tests
(which should run on a 1:1 system copy, but should be available on a shrunken
system, too).

So this extensions supplies smallest possible binary files as an in-place
replacement for those files, while still providing a real file (e.g. videos are
playable, archives are extractable).

The file types also include legacy stuff like `.flv` or `.rm` as these are found
in actual systems.

Images are excluded from this, as they would possibly break visual regression testing
