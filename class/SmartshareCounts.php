<?php
class SmartshareCounts
{
    public static function increment($platform, $url)
    {
        global $xoopsDB;

        $platform = strtolower($xoopsDB->escape($platform));
        $url = $xoopsDB->escape($url);

        $check = $xoopsDB->query("SELECT id FROM " . $xoopsDB->prefix("smartshare_counts") . " WHERE platform = '$platform' AND url = '$url'");
        if ($xoopsDB->getRowsNum($check) > 0) {
            $xoopsDB->queryF("UPDATE " . $xoopsDB->prefix("smartshare_counts") . " SET count = count + 1 WHERE platform = '$platform' AND url = '$url'");
        } else {
            $xoopsDB->queryF("INSERT INTO " . $xoopsDB->prefix("smartshare_counts") . " (platform, url, count) VALUES ('$platform', '$url', 1)");
        }
    }

    public static function getCounts($url)
    {
        global $xoopsDB;

        $url = $xoopsDB->escape($url);
        $result = $xoopsDB->query("SELECT platform, count FROM " . $xoopsDB->prefix("smartshare_counts") . " WHERE url = '$url'");

        $counts = [];
        while ($row = $xoopsDB->fetchArray($result)) {
            $counts[strtolower($row['platform'])] = (int)$row['count'];
        }

        return $counts;
    }
}
