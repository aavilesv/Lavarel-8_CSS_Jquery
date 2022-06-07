<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name'=>$this->faker->sentence(),
            'apellido'=>$this->faker->sentence(),
            'user_id'=>$this->faker->randomElement([1,2,3,4,5,6,7,8,9]),
            'cedula'=>$this->faker->randomElement(['545656','0927554','098914275']),
            'direccion'=>$this->faker->randomElement(['Pedro Carbo ','Chimbrazo','mucho codigo'])
        ];
    }
}
