<?php

// database/factories/ItemFactory.php

use App\Models\Item;
use App\Models\ItemCondition;
use App\Models\ItemType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        $itemType = ItemType::factory()->create();
        $itemCondition = ItemCondition::factory()->create();

        return [
            'item_type' => $itemType->id,
            'item_condition' => $itemCondition->id,
            'description' => $this->faker->sentence,
            'defects' => $this->faker->optional()->paragraph,
            'quantity' => $this->faker->randomNumber(2),
            // Add other fields as needed
        ];
    }

}
