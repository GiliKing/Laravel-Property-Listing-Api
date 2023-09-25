<?php

namespace App\Enums;


enum PropertyTypeEnum : string {

    case SINGLE = 'Single-family House';
    case TOWNHOUSE = "Townhouse";
    case MULTIFAMILY = "Multi-family House";
    case BUNGALOW = "Bungalow";
}