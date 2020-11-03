<?php


namespace App\Helpers;


class DateHelper
{
    const MONTHS = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ];

    public static function getMonths($year = null)
    {
        $months = [];
        if ($year == null) {
            $year = date('Y');
        }

        foreach (self::MONTHS as $month) {
            $lastDayOfMonth = new \DateTime('last day of '. $month);
            $lastDay = $lastDayOfMonth->format('d');
            $time = '01.'. $month . '.' . $year . ' - ' . $lastDay . '.' . $month . '.' . $year;

            $months[$time] = $month;
        }
        return $months;
    }

    public static function getSpecificDateRange($year = null, $month = null)
    {
        if ($year == null) {
            $year = date('Y');
        }
        if(is_array($month)) {
            $month = $month[0];
        }
        elseif ($month == null) {
            return '01.January.' . $year . ' - ' . '31.December.' . $year;
        }else {
            $lastDayOfMonth = new \DateTime('last day of '. $month);
            $lastDay = $lastDayOfMonth->format('d');
            return '01.' . $month . '.' . $year . ' - ' . $lastDay . '.' . $month . '.' . $year;
        }
    }

    public static function getYearsByDbData($models)
    {
        $years = [];
        foreach ($models as $model) {
            if (!empty($first = $model::find()->select('date')->orderBy(['date' => SORT_ASC])->limit(1)->column()) &&
                !empty($last = $model::find()->select('date')->orderBy(['date' => SORT_DESC])->limit(1)->column())) {
                $first[] = implode('', $first);
                $last[] = implode('', $last);
            }
        }
        if (!empty($first) && !empty($last)) {
            $first = date('Y', min($first));
            $last = date('Y', max($last));

            for ($i = $first; $i <= $last; $i++) {
                $years[] = $i;
            }
            return $years;
        }
    }

    public static function getSplitDateRangeInTimestamp($date = null)
    {
        if ($date == null ) {
            $firstDayOfMonth = new \DateTime('first day of this month');
            $lastDayOfMonth = new \DateTime('last day of this month');
            $firstDay = $firstDayOfMonth->format('d F');
            $lastDay = $lastDayOfMonth->format('d F');

            $start = strtotime($firstDay);
            $end = strtotime($lastDay);
        }else {
            $date = explode(' - ', $date);
            $start = strtotime($date[0]);
            $end = strtotime(end($date));
        }

        return ['start' => $start, 'end' => $end];
    }

    public static function dateRangeToTimestampRange($dateRange)
    {
        $splittedDate = explode(' - ', $dateRange);
        $start = strtotime($splittedDate[0]);
        $end = strtotime(end($splittedDate));

        return ['start' => $start, 'end' => $end];
    }
}
