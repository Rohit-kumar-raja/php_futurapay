<?php

namespace Futurapay\Sdk\Enums;


enum PaymentURL: string
{

    case LIVE_URL = 'https://payment-widget.futurapay.com/widget/deposit/?';
    case STAGE_URL = 'https://stage-payment-widget.futurapay.com/widget/deposit/?';
}
