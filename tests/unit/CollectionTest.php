<?php

use App\Support\Collection;

class CollectionTest extends \PHPUnit\Framework\TestCase
{
    //add this docblock, so you don't need putting "test_" before
    /** @test */
    public function empty_instantiated_collection_returned_no_items()
    {
        $collection = new Collection();

        $this->assertEmpty($collection->get());
    }

    /** @test */
    public function count_is_correct_for_items_passed_in()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);
        $this->assertEquals(3, $collection->count());
    }

    /** @test */
    public function items_returned_match_items_passed_in()
    {
        $collection = new Collection([
            'one', 'two'
        ]);

        $this->assertCount(2, $collection->get());
        $this->assertEquals($collection->get()[0], 'one');
        $this->assertEquals($collection->get()[1], 'two');
    }

    /**
     * @test
     */
    public function collection_is_instance_of_iterator_aggregate()
    {
        $collection = new Collection();
        $this->assertInstanceOf(IteratorAggregate::class, $collection);
    }

    /**
     * @test
     */
    public function collection_can_be_iterated()
    {
        $collection = new Collection([
            'one', 'two', 'three'
        ]);

        $items = [];
        foreach ($collection as $item) {
            $items[] = $item;
        }

        $this->assertCount(3, $items);
        $this->assertInstanceOf(ArrayIterator::class, $collection->getIterator());
    }

    /**
     * @test
     */
    public function collection_can_be_merged_with_another_collection()
    {
        $collection1 = new Collection(['one', 'two']);
        $collection2 = new Collection(['three', 'four', 'five']);

        $collection1->merge($collection2);

        $this->assertCount(5, $collection1->get());
        $this->assertEquals(5, $collection1->count());
    }

    /**
     * @test
     */
    public function can_add_to_existing_collection()
    {
        $collection1 = new Collection(['one', 'two']);

        $collection1->add(['three']);

        $this->assertCount(3, $collection1->get());
        $this->assertEquals(3, $collection1->count());
    }

    /**
     * @test
     */
    public function returns_json_encoded_items()
    {
        $collection = new Collection([
            [
                'username' => 'Alex'
            ],
            [
                'username' => 'Piotr'
            ]
        ]);

        $this->assertInternalType('string', $collection->toJson());
        $this->assertEquals('[{"username":"Alex"},{"username":"Piotr"}]', $collection->toJson());
    }

    /**
     * @test
     */
    public function json_encoding_a_collection_object_returns_json()
    {
        $collection = new Collection([
            [
                'username' => 'Alex'
            ],
            [
                'username' => 'Piotr'
            ]
        ]);

        $encoded = json_encode($collection);

        $this->assertInternalType('string', $encoded);
        $this->assertEquals('[{"username":"Alex"},{"username":"Piotr"}]', $encoded);
    }
}