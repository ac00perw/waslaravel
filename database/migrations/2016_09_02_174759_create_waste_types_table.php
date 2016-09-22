<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWasteTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waste_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
        });

        $types=array(
                'Beverage',
                'Condiment',
                'Dairy',
                'Fruit/Veg',
                'Grain/Starch',
                'Meat',
                'Misc',
                'Restaurant',
                'Snack/Dessert');

        foreach($types as $type){
                DB::table('waste_types')->insert(
                    array(
                        'name' => $type,
                    )
                );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('waste_types');
    }
}
