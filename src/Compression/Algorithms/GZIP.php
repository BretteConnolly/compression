<?php

namespace Utopia\Compression\Algorithms;

use Utopia\Compression\Compression;

class GZIP extends Compression
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return Compression::GZIP;
    }

    /**
     * Compress.
     *
     * We use gzencode over gzcompress for better support of the first format among other tools.
     * (http://stackoverflow.com/a/621987/2299554)
     *
     * @see http://php.net/manual/en/function.gzencode.php
     *
     * @param  string  $data
     * @return string
     */
    public function compress(string $data): string
    {
        return \gzencode($data);
    }

    /**
     * Decompress.
     *
     * @param  string  $data
     * @return string
     */
    public function decompress(string $data): string
    {
        return \gzdecode($data);
    }

    /**
     * Check if the algorithm is supported.
     *
     * @return bool
     */
    public static function isSupported(): bool
    {
        return \function_exists('gzencode');
    }
}
