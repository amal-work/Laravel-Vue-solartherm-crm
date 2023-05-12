<?php

use Illuminate\Validation\Rule;

return [
    'products' => [
        'solar-pv' => [
            'name' => 'Solar PV',
            'system_validation' => [
                'panels' => 'array',
                'battery' => 'required|in:y,n',
                'battery_usage' => 'nullable|required_unless:battery,n|numeric|min:5|max:100',
                'chop_cloc' => 'in:y,n',
                'inverter_type' => 'required|in:standard,solaredge,tigo',
                'aframes' => 'required|min:0|max:100',
                'voltage_optimiser' => 'required|in:y,n',
                'black_framed_panels' => 'required|in:y,n',
                'solar_usage_percentage' => 'required|min:0|max:100',
                'government_fit_rate' => 'required|numeric|min:0|max:5',
                'electricity_export_rate' => 'required|numeric|min:0|max:5',
                'electricity_rate' => 'required|numeric|min:0|max:5',
                'system_cost' => 'required|numeric|min:0',
                'annual_system_output' => 'required|numeric|min:0',
            ],
            'services_included' => [
                'Scaffold equipment to gain access to your roof',
                'Roof structural survey',
                'Building control notification',
                'Energy Performance Certificate (EPC) Assessment & Certification (if required)',
                'Distribution Network Operator (DNO) notification of system',
                'Design, installation and all associated electrical wiring',
                'Commissioning and Testing',
                'Microgeneration Certification Scheme (MCS) Commissioning Certificate',

            ],
            'inverter_types' => [
                'standard' => 'String Inverter',
                'solaredge' => 'SolarEdge Inverter',
                'tigo' => 'Tigo Inverter',
            ]
        ],

        'hybrid-boiler' => [
            'name' => 'Hybrid Boiler',
            'system_validation' => [
                'gas_pipe_upgrade_22' => 'required|in:y,n',
                'hybrid_boiler_type' => 'required',
                'rhi_tariff' => 'required',
                /*'temperature_in' => 'required|numeric|min:-40|max:200',
                'temperature_outer' => 'required|numeric|min:-40|max:200',
                'inside_heat_transfer' => 'required|numeric',
                'outside_heat_transfer' => 'required|numeric',
                'thermal_conductivity1' => 'required|numeric',
                'thermal_conductivity2' => 'required|numeric',
                'thermal_conductivity3' => 'required|numeric',
                'thickness_layer1' => 'required|numeric',
                'thickness_layer2' => 'required|numeric',
                'thickness_layer3' => 'required|numeric'*/
                /*'room_name' => 'required',
                'room_types'=>'required|in:BedRooms,solaredge,tigo', 
                'room_area'=>'required|numeric',
                'room_height'=>'required|numeric',
                'wall_other_side'=>'required|in:BedRooms, showers',
                'wall_material'=>'required|in:BedRooms, showers',
                'wall_area'=>'required|numeric',
                'wall_number'=>'required|numeric',
                'window_door'=>'required|in:BedRooms, showers',
                'window_door_area'=>'required|numeric',
                'window_number'=>'required|numeric',
                'floor_other_side'=>'required|in:BedRooms, showers',
                'floor_material'=>'required|in:BedRooms,showers',
                'celling_other_side'=>'required|in:BedRooms,showers',
                'celling_material'=>'required|in:BedRooms,showers',*/
            ],
            
            'hybrid_boiler_type' => [
                'Daikin Althema 5kW (EVLQ05CAV3 + EHYBM05AAV32)',
                'Daikin Althema 8kW (EVLQ05CAV3 + EHYHBH08AAV32)'                
            ],
            'rhi_tariff' => [
                'Scaffold equipment to gain access to your roof',
                'Roof structural survey',
                'Building control notification',
                'Energy Performance Certificate (EPC) Assessment & Certification (if required)',
                'Distribution Network Operator (DNO) notification of system',
                'Design, installation and all associated electrical wiring',
                'Commissioning and Testing',
                'Microgeneration Certification Scheme (MCS) Commissioning Certificate',

            ],
            'room_types' => [        
                'Living' => 'Living',
                'Dining' => 'Dining',    
                'Kitchen' => 'Kitchen',
                'Hall' => 'Hall',
                'Toiler' => 'Toiler',
                'Study' => 'Study',
                'Bath' => 'Bath',
                'Store' => 'Store',
                'Dressing ' => 'Dressing ',                
            ],
            'wall_other_side' => [        
                'Living' => 'Living',
                'Dining' => 'Dining',    
                'Kitchen' => 'Kitchen',
                'Hall' => 'Hall',
                'Toiler' => 'Toiler',
                'Study' => 'Study',
                'Bath' => 'Bath',
                'Store' => 'Store',
                'Dressing ' => 'Dressing ',  
                'Outside' => 'Outside'              
            ],
            'wall_material' => [        
                'solidbrick' => 'solidbrick',
                'solidstone' => 'solidstone'      
            ],
            'window_door' => [        
                'Window - Single glazed' => 'Window - Single glazed',
                'Window - Double glazed' => 'Window - Double glazed',    
                'Window - Tripple glazed' => 'Window - Tripple glazed',
                'Door - Uninsulated, ' => 'Door - Uninsulated, ',
                'Door - Insulated' => 'Door - Insulated',                           
            ],
            'inverter_types' => [
                'standard' => 'String Inverter',
                'solaredge' => 'SolarEdge Inverter',
                'tigo' => 'Tigo Inverter',
            ]   
        ]
    ],
    'employment_statuses' => [
        'full_time' => 'Full-time employed',
        'part_time' => 'Part-time employed',
        'self_employed' => 'Self employed',
        'retired' => 'Retired',
        'unemployed' => 'Unemployed',
        'other' => 'Other',
    ],
    'lead_statuses' => [
        'new' => "New lead",
        'assessment' => "Telcan assessment",
        'booked' => "Lead booked",
        'invalid_number' => "Invalid number",
        'wrong_details' => "Wrong details",
        'previously_contacted' => "Previously contacted",
        'out_of_area' => "Out of area",
        'not_interested' => "Not interested",
        'unsuitable' => "Unsuitable",
        'foreigner' => "Foreigner",
        'unable_to_contact' => "Unable to contact",
        'callback' => "Call back",
    ],
    'payment_methods' => [
        'finance' => 'Finance',
        'cash' => 'Cash'
    ],
    'english_honorifics' => [
        'Mr',
        'Ms',
        'Miss',
        'Mrs',
        'Mx',
        'Master',
        'Sir',
        'Madam',
        'Dame',
        'Lord',
        'Lady',
        'Dr',
        'Prof',
        'Br',
        'Sr',
        'Fr',
        'Rev',
        'Pr',
        'Elder'
    ]
];
