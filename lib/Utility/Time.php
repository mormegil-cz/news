<?php
/**
 * Nextcloud - News
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author    Bernhard Posselt <dev@bernhard-posselt.com>
 * @copyright 2016 Bernhard Posselt
 */

namespace OCA\News\Utility;

use DateTime;

class Time
{
    /**
     * Get the timestamp of a DateTime value safely for a 32-bit platform
     * @param DateTime|null $dateTime Optional date time value
     * @return int|null Result of $dateTime->getTimestamp() if it fits into an int, otherwise PHP_INT_MAX
     */
    public static function getDateTimeTimestamp(?DateTime $dateTime): ?int
    {
        if ($dateTime === null) {
            return null;
        }
        $asFloat = floatval($dateTime->format('U'));
        return $asFloat > PHP_INT_MAX ? PHP_INT_MAX : intval($asFloat);
    }

    public function getTime(): int
    {
        return time();
    }

    /**
     * @return string the current unix time in milliseconds
     */
    public function getMicroTime(): string
    {
        list($millisecs, $secs) = explode(" ", microtime());
        return $secs . substr($millisecs, 2, 6);
    }
}
