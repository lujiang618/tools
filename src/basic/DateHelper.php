<?php
/**
 * Created by PhpStorm.
 * User: lujiang
 * Date: 2019/3/18
 * Time: 13:12
 */

namespace Tools\basic;


class DateHelper
{
    /**
     * 获取两个时间点之间所有的日期
     *
     * @param string $startDate
     * @param string $endDate
     *
     * @return array
     */
    public static function getDateFromRange(string $startDate, string $endDate) :array
    {
        $start = strtotime(date('Y-m-d', strtotime($startDate)));
        $end   = strtotime(date('Y-m-d', strtotime($endDate)));

        // 计算日期段内有多少天
        $days = ($end - $start) / 86400 + 1;

        // 保存每天日期
        $date = [];
        for ($i = 0 ; $i < $days ; $i++) {
            $date[] = date('Y-m-d', $start + (86400 * $i));
        }

        return $date;
    }

    /**
     * 判断两个时间段之间是否有交叉（边界相等也算交叉）
     * @param string $periodOneStart
     * @param string $periodOneEnd
     * @param string $periodTwoStart
     * @param string $periodTwoEnd
     *
     * @return bool
     */
    public function isCross($periodOneStart = '', $periodOneEnd = '', $periodTwoStart = '', $periodTwoEnd = '') :bool
    {
        $status = $periodTwoStart - $periodOneStart;

        if ($status > 0) {
            $status2 = $periodTwoStart - $periodOneEnd;
            if ($status2 > 0) {
                return false;
            } else {
                return true;
            }
        } else {
            $status2 = $periodTwoEnd - $periodOneStart;
            if ($status2 >= 0) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * 将H:i 格式的时间转换成秒
     * @param string $hourMinute
     *
     * @return int
     */
    public static function getMinute(string $hourMinute) :int
    {
        list($hour,$minute) = explode(':',$hourMinute);

        if (empty($hour) || empty($minute)) {
            return 0;
        }

        return $hour*60+$minute;
    }

    /**
     * 返回本周开始和结束的时间戳
     *
     * @return array
     */
    public static function week() :array
    {
        $timestamp = time();

        return [
            'start' => strtotime(date('Y-m-d', strtotime("Monday this week", $timestamp))),
            'end'   => strtotime(date('Y-m-d', strtotime("Sunday this week", $timestamp))) + 24 * 3600 - 1,
        ];
    }

    /**
     * @description   本周开始
     * @author        lujiang
     *
     *
     * @return int
     *
     */
    public static function getWeekStartTime() :int
    {
        $currentTime = strtotime(date('Y-m-d'));
        $nowDay      = date('w', $currentTime);
        $weekStart   = $currentTime - ($nowDay - 1) * 60 * 60 * 24;

        return $weekStart;
    }

    /**
     * @description  本周最后
     * @author       lujiang
     *
     *
     * @return int
     *
     */
    public static function getWeekEndTime() :int
    {
        $currentTime = strtotime(date('Y-m-d').' 23:59:59');
        $nowDay      = date('w', $currentTime) == 0 ? 7 : date('w', $currentTime);
        $weekEnd     = $currentTime + (7 - $nowDay) * 24 * 3600;

        return $weekEnd;
    }

    /**
     * @description  获取毫秒级的时间戳（四舍五入了）
     * @author       lujiang
     *
     *
     * @return int
     *
     */
    public static function getMsecTime() : int
    {
        return round(microtime(true) * 1000, 0);
    }

    private function todo() {
        //本周一
        echo date('Y-m-d', (time() - ((date('w') == 0 ? 7 : date('w')) - 1) * 24 * 3600)); //w为星期几的数字形式,这里0为周日

        //本周日
        echo date('Y-m-d', (time() + (7 - (date('w') == 0 ? 7 : date('w'))) * 24 * 3600)); //同样使用w,以现在与周日相关天数算

        //上周一
        echo date('Y-m-d', strtotime('-1 monday', time())); //无论今天几号,-1 monday为上一个有效周未

        //上周日
        echo date('Y-m-d', strtotime('-1 sunday', time())); //上一个有效周日,同样适用于其它星期

        //本月一日
        echo date('Y-m-d', strtotime(date('Y-m', time()).'-01 00:00:00')); //直接以strtotime生成

        //本月最后一日
        echo date('Y-m-d', strtotime(date('Y-m', time()).'-'.date('t', time()).' 00:00:00')); //t为当月天数,28至31天

        //上月一日
        echo date('Y-m-d', strtotime('-1 month', strtotime(date('Y-m', time()).'-01 00:00:00'))); //本月一日直接strtotime上减一个月

        //上月最后一日
        echo date('Y-m-d', strtotime(date('Y-m', time()).'-01 00:00:00') - 86400); //本月一日减一天即是上月最后一日
    }
}