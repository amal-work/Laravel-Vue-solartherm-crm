@extends('layouts.main')

@section('content')
    @include('saps._top_bar', ["sap_step"=>$sap->sap_step])    
    <form class="system" role="form" data-toggle="validator">
        <div class="card energy_generation_calculation">
            <div class="card-header">
                Boiler Information
            </div>

            <div class="card-block">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Battery -->
                        <div class="form-group">
                            {{ Form::label('gas_pipe_upgrade_22', '22mm Gas Pipe Upgrade') }}
                            {{ Form::select('gas_pipe_upgrade_22', array(
                                    'y'   => 'Yes',
                                    'n'    => 'No'
                                    ), y,
                                array(
                                    'id'       => 'gas_pipe_upgrade_22',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'gas_pipe_upgrade_22'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Battery Usage Percent -->
                        <div class="form-group">
                            {{ Form::label('hybrid_boiler_type', 'Hybrid Boiler Type') }}                                
                            {{ Form::select('hybrid_boiler_type', Config::get('crm.products.hybrid-boiler.hybrid_boiler_type'), 'null',
                                array(
                                    'id'       => 'hybrid_boiler_type',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'hybrid_boiler_type'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <!-- Chop Clock -->
                        <div class="form-group">
                            {{ Form::label('rhi_tariff', 'RHI Tariff') }}
                            {{ Form::select('rhi_tariff', Config::get('crm.products.hybrid-boiler.rhi_tariff'), null,
                                array(
                                    'id'       => 'rhi_tariff',
                                    'class'    => 'form-control',
                                    'required' => '',
                                    'v-model'  => 'rhi_tariff'
                            )) }}
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card array_configuration">
            <div class="card-header">
                Add Rooms
            </div>
            <div class="card-block room-block-container" is="room" v-for = "room in rooms" :room = "room"></div>            
        </div>
        
        @include('saps._bottom_bar')
    </form>
@endsection

@section('custom_styles')

@endsection
@section('custom_script')
    <script type="text/x-template" id="rooms-template">
        <div class="card-block">
            <div class="row">
                <div class="card add-room-margin" style="width: 100%;">
                    <div class="card-block room-block-container">
                        <div class="row">
                            <div class="col-md-10">                                
                                <h3><span class="badge badge-primary">Customer's Room</span></h3>
                            </div>   
                            <div class="col-md-1 text-right">                                 
                                {{ Form::button('+', array('class' => 'btn btn-success', 'id' => 'add', 'v-on:click'=>'addRoom')) }}
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">                                     
                                    {{ Form::button('-', array('class' => 'btn btn-danger remove', 'v-on:click'=> 'removeRoom')) }}
                                </div>
                            </div>                           
                        </div>
                        <div class="row">
                            <div class="add-room-margin" style="width: 100%;">
                                <div class="card-block room-block-container">
                                    <div class="row">
                                        <div class="col-md-3">  
                                            <div class="form-group">
                                                {{ Form::label('room_name', 'Room name') }}
                                                {{ Form::text('room_name', null, array(                        
                                                    'class'    => 'form-control room_name',
                                                    'required' => '',
                                                    'v-model'  => 'room.room_name'
                                                )) }}
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"> 
                                                {{ Form::label('room_type', 'Room type') }}
                                                {{ Form::select('room_type',Config::get('crm.products.hybrid-boiler.room_types'), 'london',
                                                    array(                            
                                                        'class'   => 'form-control room_type',
                                                        'required'  => '',
                                                        'v-model' => 'room.room_type'
                                                )) }} 
                                            </div>
                                        </div>
                                        <div class="col-md-3">    
                                            <div class="form-group">                     
                                                {{ Form::label('room_area', 'Room area') }} 
                                                <input type="number" step="1" min="0" class="form-control room_area" 
                                                v-model="room.room_area">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group"> 
                                                {{ Form::label('room_height', 'Height') }}    
                                                {{ Form::number('room_height', 0, array(
                                                    'min'       => '0',
                                                    'step'      => 'any',                        
                                                    'class'     => 'form-control room_height',
                                                    'required'  => '',
                                                    'v-model'   => 'room.room_height'
                                                )) }}
                                            </div>
                                        </div>                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="card room-wall-card" style="width:100%" is="wall" v-for = "wall in room.walls" :wall = "wall"></div>
                                    </div>     
                                    
                                    <div class="row">
                                        <div class="card room-wall-card" style="width: 100%;">
                                            <div class="card-block">
                                                <div class="row">                                               
                                                    <div class="col-md-12">                                
                                                        <h4><span class="badge badge-primary">Room's Floor</span></h4>
                                                    </div>                                                     
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-3">  
                                                        <div class="form-group">                       
                                                            {{ Form::label('floor_other_side', 'Floor - Other side') }}
                                                            {{ Form::select('floor_other_side', Config::get('crm.products.hybrid-boiler.wall_other_side'), 'london',
                                                                array(
                                                                    'id'      => 'floor_other_side',
                                                                    'class'   => 'form-control',
                                                                    'required'  => '',
                                                                    'v-model' => 'room.floor_other_side'
                                                            )) }}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group"> 
                                                            {{ Form::label('floor_material', 'Floor Material') }}
                                                            {{ Form::select('floor_material', Config::get('crm.products.hybrid-boiler.wall_material'), 'london',
                                                                array(        
                                                                    'class'   => 'form-control floor_material',
                                                                    'required'  => '',
                                                                    'v-model' => 'room.floor_material'
                                                            )) }}
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">    
                                                        <div class="form-group">                     
                                                            {{ Form::label('celling_other_side', 'Celling - Other side') }} 
                                                            {{ Form::select('celling_other_side', Config::get('crm.products.hybrid-boiler.wall_other_side'), 'london',
                                                                array(        
                                                                    'class'   => 'form-control celling_other_side',
                                                                    'required'  => '',
                                                                    'v-model' => 'room.celling_other_side'
                                                            )) }}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group"> 
                                                            {{ Form::label('celling_material', 'Celling material') }}    
                                                            {{ Form::select('celling_material', Config::get('crm.products.hybrid-boiler.wall_material'), 'london',
                                                                array(        
                                                                    'class'   => 'form-control celling_material',
                                                                    'required'  => '',
                                                                    'v-model' => 'room.celling_material'
                                                            )) }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                               
                                </div>
                            </div>
                        </div>                        
                        
                    </div>
                </div> 
            </div>                
        </div>  
    </script>
    
    <script type="text/x-template" id="walls-template">
        <div class="card-block">
            <div class="row">                                                    
                <div class="col-md-10">  
                    <h4><span class="badge badge-primary">Room's Wall</span></h4>
                </div>
                <div class="col-md-1 text-right">                                 
                    {{ Form::button('+', array('class' => 'btn btn-success', 'id' => 'add', 'v-on:click'=>'addWall')) }}
                </div>
                <div class="col-md-1">
                    <div class="form-group">                                     
                        {{ Form::button('-', array('class' => 'btn btn-danger remove', 'v-on:click'=> 'removeWall')) }}
                    </div>
                </div> 
            </div>                                                
            <div class="row">
                <div class="col-md-4">                        
                    {{ Form::label('wall_other_side', 'Wall other side') }}
                    {{ Form::select('window_door', Config::get('crm.products.hybrid-boiler.wall_other_side'), 'null',
                        array(
                            'id'      => 'wall_other_side',
                            'class'   => 'form-control',
                            'required'  => '',
                            'v-model' => 'wall.wall_other_side'
                    )) }}
                </div>
    
                <div class="col-md-4">
                    {{ Form::label('wall_material', 'Wall material') }}                                                        
                    {{ Form::select('wall_material', Config::get('crm.products.hybrid-boiler.wall_material'), 'null',
                        array(
                            'id'      => 'wall_material',
                            'class'   => 'form-control',
                            'required'  => '',
                            'v-model' => 'wall.wall_material'
                    )) }}
                </div>
                <div class="col-md-2">
                    {{ Form::label('wall_area', 'Wall area') }}
                    <input type="number" step="1" min="0" class="form-control wall_area" v-model="wall.wall_area">
                </div>
                <div class="col-md-2">
                {{ Form::label('wall_number', 'Number of walls') }}                                                        
                <input type="number" step="1" min="0" class="form-control wall_number" v-model="wall.wall_number">
                </div>
            </div>
            <div class="row">
                <div class="card room-wall-card" style="width:100%" is="window_door" v-for = "window_door in wall.window_doors" :window_door = "window_door"></div>
            </div>   
        </div>
    </script>

    <script type="text/x-template" id="window_doors-template">
        <div class="card-block">
            <div class="row">                                               
                <div class="col-md-10">                                
                    <h5><span class="badge badge-primary">Wall's Window & Door</span></h5>
                </div>   
                <div class="col-md-1 text-right">                                 
                    {{ Form::button('+', array('class' => 'btn btn-success btn-sm', 'id' => 'add', 'v-on:click'=>'addwindow_door')) }}
                </div>
                <div class="col-md-1">
                    <div class="form-group">                                     
                        {{ Form::button('-', array('class' => 'btn btn-danger btn-sm remove', 'v-on:click'=> 'removewindow_door')) }}
                    </div>
                </div>                                                         
            </div>

            <div class="row">
                <div class="col-md-6">                        
                    {{ Form::label('wall_window_door', 'Window/Door') }}
                    {{ Form::select('window_door', Config::get('crm.products.hybrid-boiler.window_door'), 'null',
                        array(
                            'id'      => 'window_door',
                            'class'   => 'form-control',
                            'required'  => '',
                            'v-model' => 'window_door.window_door'
                    )) }}
                </div>

                <div class="col-md-3">                                              
                    {{ Form::label('window_door_area', "Window/Door's area") }}                                                        
                    <input type="number" step="1" min="0" class="form-control window_door_area" v-model="window_door.window_door_area">  
                </div>

                <div class="col-md-3">
                    {{ Form::label('window_number', 'Number of window& door') }}                                                        
                    <input type="number" step="1" min="0" class="form-control window_door_area" v-model="window_door.window_number">
                </div>
            </div>
        </div>
    </script>
    
    <script>
        Vue.component('window_door', {
            props: ['window_door'],
            template: '#window_doors-template',
            methods: {
                addwindow_door: function() {
                    console.log(this.$parent.wall.window_doors);
                    this.$parent.wall.window_doors.push(
                        {
                            'window_door': '',
                            'window_door_area': 0,
                            'window_number': 0           
                        }
                    );
                },
                
                removewindow_door: function() {
                    var window_doors_array = this.$parent.wall.window_doors;
                    window_doors_array.splice(window_doors_array.indexOf(this.window_door), 1);
                }
            }
        });
        Vue.component('wall', {
            props: ['wall'],
            template: '#walls-template',
            methods: {
                addWall: function() {
                    this.$parent.room.walls.push(
                        {
                            'wall_other_side': '',
                            'wall_material': '',
                            'wall_area': 0,
                            'wall_number': 0,
                            'window_doors': [{
                                'window_door': '',
                                'window_door_area': 0,
                                'window_number': 0
                            }],                    
                        }
                    );
                    console.log(this.$parent.room.walls)
                },
                
                removeWall: function() {
                    var walls_array = this.$parent.room.walls;
                    walls_array.splice(walls_array.indexOf(this.wall), 1);
                }
            }
        });
        Vue.component('room', {
            props: ['room'],
            template: '#rooms-template',
            methods: {
                update_total_area: function () {
                    console.log('update total area');                    
                    console.log(this.room);                    
                    this.room.total_area = Number(this.room.room_area) + 
                                           (Number(this.room.walls['wall_area']) * Number(this.room.walls['wall_number'])) + 
                                           (Number(this.room.walls.window_doors['window_door_area']) * Number(this.room.walls.window_doors['window_number']));
                },
                removeRoom: function () {
                    console.log(this.room);
                    var rooms_array = this.$parent.rooms;
                    rooms_array.splice(rooms_array.indexOf(this.room), 1);
                },
                addRoom: function () {     
                    console.log(this.$parent.room);
                    this.$parent.rooms.push({
                        'room_name': '',
                        'room_type': '',
                        'room_area': 0,
                        'room_height': 0,
                        'floor_other_side': '',
                        'floor_material': '',
                        'celling_other_side': '',
                        'celling_material': '',
                        'total_area': 0,                        
                        'walls': [
                            {
                                'wall_other_side': '',
                                'wall_material': '',
                                'wall_area': 0,
                                'wall_number': 0,
                                'window_doors': [{
                                    'window_door': '',
                                    'window_door_area': 0,
                                    'window_number': 0
                                }],                    
                            }
                        ],

                    });
                }
            }

        });

        var app = new Vue({
            el: '#app',
            methods: {
                //Function to assign and fetch "U" values of different materials
                getUvalue: function(room_type){
                     var uvalue = {
                        "solidbrick": 2.11,
                        "solidstone": 2.23
                    }; // you can add extra materials and their respective U values

                    return uvalue[room_type];
                },
                //Function to assign and fetch "Air Change Factor" values of different room types
                getairchangevalue: function(room_type){
                    var Airchange = {
                        "Living": 05,
                        "Dining": 0.5,
                        "Kitchen": 1.5,
                        "Hall": 0.5,
                        "Toilet": 1.5,
                        "Bedroom": 0.5,
                        "Study": 0.5,
                        "Bath": 1.5,
                        "Store": 0.5,
                        "Dressing": 0.5
                    }; //You can add other types of room and their respective operating temperatures.

                    return Airchange[room_type];
                },
                //Function to assign and fetch "operating room temperature".
                getroomtemp: function(room_type){
                    if (room_type == "Outside")
                        return outside_temperature;

                    var Roomtemp = {
                        "Living": 21,
                        "Dining": 21,
                        "Kitchen": 18,
                        "Hall": 18,
                        "Toilet": 18,
                        "Bedroom": 18,
                        "Study": 21,
                        "Bath": 22,
                        "Store": 18,
                        "Dressing": 16
                    }; //You can add other types of room

                    return Roomtemp[room_type];
                },
                //Function to calculate Fabric Heat Loss
                getQfabric:function(room_dimensions, room_type, room_outside, wall_area, window_area, wall_material, window_material){
                    var Q_wall_1 = (wall_area[1] - window_area[1]) * this.getUvalue(wall_material[1]) * (this.getroomtemp(room_type) - this.getroomtemp(room_outside[1]));

                    if (window_area[1])
                        Q_wall_1 += window_area[1] * this.getUvalue(window_material[1]) * (this.getroomtemp(room_type) - this.getroomtemp(room_outside[1]));


                    var Q_wall_2 = (wall_area[2] - window_area[2]) * this.getUvalue(wall_material[2]) * (this.getroomtemp(room_type) - this.getroomtemp(room_outside[2]));

                    if (window_area[2])
                        Q_wall_2 += window_area[2] * this.getUvalue(window_material[2]) * (this.getroomtemp(room_type) - this.getroomtemp(room_outside[2]));

                    var Q_wall_3 = (wall_area[3] - window_area[3]) * this.getUvalue(wall_material[3]) * (this.getroomtemp(room_type) - this.getroomtemp(room_outside[3]));

                    if (window_area[3])
                        Q_wall_3 += window_area[3] * this.getUvalue(window_material[3]) * (this.getroomtemp(room_type) - this.getroomtemp(room_outside[3]));

                    var Q_wall_4 = (wall_area[4] - window_area[4]) * this.getUvalue(wall_material[4]) * (this.getroomtemp(room_type) - this.getroomtemp(room_outside[4]));

                    if (window_area[4])
                        Q_wall_4 += window_area[4] * this.getUvalue(window_material[4]) * (this.getroomtemp(room_type) - this.getroomtemp(room_outside[4]));

                    var Q_floor = (wall_area[5]) * this.getUvalue(wall_material[5]) * (this.getroomtemp(room_type) - this.getroomtemp(room_outside[5]));
                    var Q_roof = (wall_area[6]) * this.getUvalue(wall_material[6]) * (this.getroomtemp(room_type) - this.getroomtemp(room_outside[6]));

                    return Q_wall_1 + Q_wall_2 + Q_wall_3 + Q_wall_4 + Q_floor + Q_roof;
                },
                calculate: function(info){
                    var Q_fabric = 0;
                    var Q_infilitration = 0;

                    var room_dimensions = [];
                    var room_outside = [];
                    var wall_material = [];
                    var wall_area = [];
                    var window_area = [];
                    var window_material = [];
                    var room_type = info["roomtype"];
                    var room_temp = this.getroomtemp(room_type);
                    var airchange = this.getairchangevalue(room_type);


                    outside_temperature = info["outsidetemperature"];
                    room_dimensions[0] = info["roomlenght"];
                    room_dimensions[1] = info["roomwidth"];
                    room_dimensions[2] = info["roomheight"];

                    room_outside[1] = info["wall_1_outside"];
                    room_outside[2] = info["wall_2_outside"];
                    room_outside[3] = info["wall_3_outside"];
                    room_outside[4] = info["wall_4_outside"];
                    room_outside[5] = info["floor_outside"];
                    room_outside[6] = info["roof_outside"];


                    wall_material[1] = info["wall_1_material"];
                    wall_material[2] = info["wall_2_material"];
                    wall_material[3] = info["wall_3_material"];
                    wall_material[4] = info["wall_4_material"];

                    wall_material[5] = info["floor_material"];
                    wall_material[6] = info["roof_material"];

                    wall_area[1] = info["wall_1_area"];
                    wall_area[2] = info["wall_2_area"];
                    wall_area[3] = info["wall_3_area"];
                    wall_area[4] = info["wall_4_area"];


                    wall_area[5] = info["floor_area"];
                    wall_area[6] = info["roof_area"];


                    if (typeof(info["window_1_area"]) != "undefined" && info["window_1_area"] != null) {
                        window_area[1] = info["window_1_area"];
                        window_material[1] = info["window_1_material"];
                    } else
                        window_area[1] = 0;

                    if (typeof(info["window_2_area"]) != "undefined" && info["window_2_area"] != null) {
                        window_area[2] = info["window_2_area"];
                        window_material[2] = info["window_2_material"];
                    } else
                        window_area[2] = 0;

                    if (typeof(info["window_3_area"]) != "undefined" && info["window_3_area"] != null) {
                        window_area[3] = info["window_3_area"];
                        window_material[3] = info["window_3_material"];
                    } else
                        window_area[3] = 0;

                    if (typeof(info["window_4_area"]) != "undefined" && info["window_4_area"] != null) {
                        window_area[4] = info["window_4_area"];
                        window_material[4] = info["window_4_material"];
                    } else
                        window_area[4] = 0;

                    //We are calculating Infilitration Loss here         

                    Q_infilitration = 0.33 * airchange * room_dimensions[0] * room_dimensions[1] * room_dimensions[2] * (room_temp - outside_temperature);

                    //Calls Function to calculate fabric loss   
                    Q_fabric = this.getQfabric(room_dimensions, room_type, room_outside, wall_area, window_area, wall_material, window_material);

                    return Q_infilitration + Q_fabric;
                },
                formSubmit: function (e) {     
                    //console(this.$data.rooms[0]['celling_material']);
                    //alert(this.$data.rooms[0]['celling_material']);
                    //Fetching all the info required for calculations   
                    var info = [];
                    info["roomtype"] = this.$data.rooms[0]['room_type'];
                    info["outsidetemperature"] = -1.8;  //sth to add
                    info["roomlenght"] = 10;  //sth to add
                    info["roomwidth"] = parseFloat(this.$data.rooms[0]['room_area']);
                    info["roomheight"] = parseFloat(this.$data.rooms[0]['room_height']);

                    var walls = this.$data.rooms[0]['walls'];
                    //alert(walls);
                    info["wall_1_outside"] = walls[0]['wall_other_side'];
                    info["wall_2_outside"] = "Living";//walls[1]['wall_other_side'];
                    info["wall_3_outside"] = "Living";//walls[2]['wall_other_side'];
                    info["wall_4_outside"] = "Living";//walls[3]['wall_other_side'];
                    
                    info["floor_outside"] = this.$data.rooms[0]['floor_other_side'];
                    info["roof_outside"] = "Outside";  //sth to add


                    info["wall_1_material"] = walls[0]['wall_material'];
                    info["wall_2_material"] = "solidbrick"//walls[1]['wall_material'];
                    info["wall_3_material"] = "solidbrick"//walls[2]['wall_material'];
                    info["wall_4_material"] = "solidbrick"//walls[3]['wall_material'];

                    info["floor_material"] = this.$data.rooms[0]['floor_material'];
                    info["roof_material"] = "solidbrick";

                    info["wall_1_area"] = parseFloat(walls[0]['wall_area']);
                    info["wall_2_area"] = 100//walls[1]['wall_area'];
                    info["wall_3_area"] = 100//walls[2]['wall_area'];
                    info["wall_4_area"] = 100//walls[3]['wall_area'];

                    info["floor_area"] = 100//this.$data.rooms[0]['floor_material'];  sth to add
                    info["roof_area"] = 100;  //sth to add

                    var windowsdoors = walls[0]['window_doors'];
                    info["window_1_area"] = parseFloat(windowsdoors[0]['window_door_area']); //Optional for wall having window
                    info["window_1_material"] = "solidstone";  // sth to add                    

                    var heat_lose = this.calculate(info);
                    this.$data.all_heat_lose = heat_lose;
                    e.preventDefault();                    
                    //this.$data.annual_system_output = this.system_total;
                    $.ajax({
                        url: '{{Request::url()}}',
                        method: 'POST',
                        data: this.$data,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    }).done(function (response) {
                        console.log(response);
                        if (response.errors) {
                            $.each(response.errors, function (i, error) {
                                iziToast.error({message: error});
                            })
                        }
                        if (response.success) window.location.replace("{{url('/saps/'.$sap->id.'/cash-flow')}}");
                    });
                }/*,
                addRoom: function () {              
                    this.rooms.push({
                        'room_name': '',
                        'room_type': '',
                        'room_area': 0,
                        'room_height': 0,
                        'floor_other_side': '',
                        'floor_material': '',
                        'celling_other_side': '',
                        'celling_material': '',
                        'total_area': 0,
                        'walls': {
                            'wall_other_side': '',
                            'wall_material': '',
                            'wall_area': 0, 
                            'wall_number': 0,
                            'window_doors': {
                                'window_door': '',
                                'window_door_area': 0,
                                'window_number': 0
                            }                                        
                        }                             
                    });
                }*/
            },
            data: {
                gas_pipe_upgrade_22: '{{$system['gas_pipe_upgrad_22']}}',
                hybrid_boiler_type: '{{$system['hybrid_boiler_type']}}',
                rhi_tariff: '{{$system['rhi_tariff']}}',
                all_heat_lose: '',
                
                /*temperature_in: 0,
                temperature_outer: 0,

                inside_heat_transfer: 0,
                outside_heat_transfer: 0,

                thermal_conductivity1: 0,
                thermal_conductivity2: 0,
                thermal_conductivity3: 0,

                thickness_layer1: 0,
                thickness_layer2: 0,
                thickness_layer3: 0,          */

                rooms: @if($system['rooms'])
                    <?php echo json_decode(json_encode($system['rooms'])) ?>,
                @else
                    [{
                    'room_name': '',
                    'room_type': '',
                    'room_area': 0,
                    'room_height': 0,
                    'floor_other_side': '',
                    'floor_material': '',
                    'celling_other_side': '',
                    'celling_material': '',
                    'total_area': 0,                    
                    'walls': [{
                        'wall_other_side': '',
                        'wall_material': '',
                        'wall_area': 0,
                        'wall_number': 0,
                        'window_doors': [{
                            'window_door': '',
                            'window_door_area': 0,
                            'window_number': 0
                        }],                 
                    }]
                }],
                @endif                
            },
            computed: {
                room_total_area: function(){
                    if (!this.rooms) {
                           return 0;
                    }
                    console.log(this.rooms);                    
                    return this.rooms.reduce(function (total, value) {
                            console.log(total);
                            return total + Number(value.total_area);
                    }, 0);   
                }
            }
        });
    </script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endsection
