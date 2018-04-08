<?php





/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(App\Models\UserRoles::class, function (Faker\Generator $faker) {
    return [
        'role' => $faker->name,
    ];
    });

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
         'user_role_id' => function() {
            return factory('App\Models\UserRoles')->create()->id;
        },
        'email' => $faker->unique()->safeEmail,
        'password' => 'password', // secret
        'remember_token' => str_random(10),
       
    ];
    });

$factory->define(App\Models\Operator::class, function (Faker\Generator $faker) {
    return [
        'address' => $faker->address,
        'telephone' => $faker->phoneNumber,
        'email' => $faker->safeEmail,
        'logo' => str_random(10)
        
    ];
    });


$factory->define(App\Models\Manufacturer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
    ];
    });

$factory->define(App\Models\Aircraft::class, function (Faker\Generator $faker) {
    return [
        'manufacturer_id' => function() {
        	return factory('App\Models\Manufacturer')->create()->id;
        },
        'name' => $faker->name,
        'yom' => $faker->randomNumber(4),
    ];
    });

$factory->define(App\Models\OperatorAircraft::class, function (Faker\Generator $faker) {
    return [
        'operator_id' => function() {
        	return factory('App\Operator')->create()->id;
        },
        'aircraft_id' => function() {
        	return factory('App\Aircraft')->create()->id;
        },
    ];
    });

$factory->define(App\Models\Airport::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'code' => $faker->name,
    ];
    });
 $factory->define(App\Models\Job::class, function (Faker\Generator $faker) {
    return [
        'operator_id' => function(){
            return factory('App\Models\Operator')->create()->id;
        },
        'aircraft_id' => function(){
            return factory('App\Models\Aircraft')->create()->id;
        },
        'start_date' => $faker->date,
        'end_date' => $faker->date,
        'price' => $faker->randomNumber(3),
        'job_closed' => 0,
    ];
    });

 $factory->define(App\Models\JobRoutes::class, function (Faker\Generator $faker) {
    return [
        'job_id' => 1,
        'origin_id' => function() {
        	return factory('App\Models\Airport')->create()->id;
        },
         'destination_id' => function() {
        	return factory('App\Models\Airport')->create()->id;
        },
        'departure_date' => $faker->date,
        'departure_time' => $faker->time,
     ];
     });

$factory->define(App\Models\ConfirmationStatus::class, function (Faker\Generator $faker) {
    return[
        'status' => $faker->name,
    ];
    });

$factory->define(App\Models\JobApplicants::class, function (Faker\Generator $faker) {
    return [
        'job_id' => 1,
        'user_id' => function() {
        	return factory('App\Models\User')->create()->id;
        },
         'confirmation_status_id' => $faker->numberBetween(1,3),
        
       
     ];
     });



$factory->define(App\Models\OperatorUsers::class, function (Faker\Generator $faker) {
    return [
        
        'operator_id' => function() {
        	return factory('App\Operator')->create()->id;
        },
         'user_id' => function() {
        	return factory('App\User')->create()->id;
        },       
     ];

});
