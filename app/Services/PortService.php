<?php

namespace App\Services;

class PortService
{
    public function getPorts($country)
    {

        $ports=[

            "Indonesia"=>[
                "Tanjung Priok",
                "Tanjung Perak",
                "Belawan",
                "Makassar",
                "Batam"
            ],

            "United States"=>[
                "Los Angeles",
                "Long Beach",
                "New York",
                "Houston",
                "Savannah"
            ],

            "China"=>[
                "Shanghai",
                "Shenzhen",
                "Qingdao",
                "Ningbo",
                "Guangzhou"
            ],

            "Singapore"=>[
                "Port of Singapore"
            ],

            "Germany"=>[
                "Hamburg",
                "Bremerhaven"
            ],

            "Russia"=>[
                "Novorossiysk",
                "Saint Petersburg"
            ]

        ];

        return $ports[$country] ?? [];

    }
}