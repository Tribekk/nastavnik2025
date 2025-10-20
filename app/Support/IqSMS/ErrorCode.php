<?php

namespace Support\IqSMS;


interface ErrorCode
{
    const INVALID_PHONE = 1;
    const INVALID_SENDER = 2;
    const INVALID_WARURL = 3;
    const INVALID_SCHEDULE_TIME = 4;
    const INVALID_STATUS_QUEUE = 5;
    const TEXT_EMPTY = 6;
    const NOT_ENOUGH_CREDITS = 7;
}
