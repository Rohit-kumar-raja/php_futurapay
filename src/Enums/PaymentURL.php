<?php

namespace Futurapay\Sdk\Enums;


enum PaymentURL: string
{

    case STAGE_DEPOSIT_URL = "https://stage-payment-widget.futurapay.com/widget/deposit/?";
    case STAGE_WITHDRAWAL_URL = "https://stage-payment-widget.futurapay.com/widget/withdrawal/?";
    case LIVE_DEPOSIT_URL = "https://payment-widget.futurapay.com/widget/deposit/?";
    case LIVE_WITHDRAWAL_URL = "https://payment-widget.futurapay.com/widget/withdrawal/?";
}
