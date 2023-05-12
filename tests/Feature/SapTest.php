<?php

namespace Tests\Feature;

use App\Models\Sap;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;


class SapTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */


    function testSapAdd()
    {
        $user = User::whereId(1)->first();

        $this->actingAs($user)
            ->post('/saps/add', [
                '_token' => csrf_token(),
                'notes' => 'lead booked',
                'lead_id' => 1,
                'appointment_at' => date('Y-m-d H:i:s')
            ])->assertJson(['data' => ['lead_id' => 1]]);

    }

    public function testSapQuestionnaire()
    {
        $user = User::whereId(1)->first();
        $last_sap = Sap::select()->orderBy('id', 'desc')->first()->id;
        $this
            ->actingAs($user)
            ->post('/saps/' . $last_sap . '/assessment', [
                '_token' => csrf_token(),
                'first_name' => 'Adam',
                'last_name' => 'Smith',
                'address_1' => '2-4 Howard Chase',
                'address_2' => '',
                'address_3' => '',
                'town' => 'Basildon',
                'county' => 'essex',
                'postcode' => 'SS14 3BE',
                'email' => 'test@test.com',
                'landline_phone' => '01268 552868',
                'mobile_phone' => '',

                'property_type' => 'detached',
                'boiler_type' => 'combi',
                'boiler_fuel' => 'gas',
                'electrical_appliances' => ['hob' => 2, 'oven' => 1],
                'bedrooms' => 3,
                'exposure' => 'side_road',
                'scaffolding_access' => 'good',
                'no_of_sides' => 5,
                'bathrooms' => 2,
                'year_built' => 1954,


                'roof_tiles' => 'slate',
                'inspected_tiles' => 'yes',
                'roof_lining' => 'boarding',
                'loft_condition' => 'good',
                'loft_access' => 'good',

                'electricity_spend' => 1230,
                'gas_spend' => 200,
                'kw_usage' => 100,
                'solar_usage' => 25,
                'gas_saving' => 100,
                'energy_provider' => 'edf'
            ])->assertJson(["data" => ["status" => "assessment"]]);
    }

    public function testExample()
    {
        $this->assertTrue(true);
    }

}
