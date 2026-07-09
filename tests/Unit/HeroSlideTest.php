<?php

namespace Tests\Unit;

use App\Models\HeroSlide;
use Tests\TestCase;

class HeroSlideTest extends TestCase
{
    public function test_hero_slide_has_fillable_attributes(): void
    {
        $slide = new HeroSlide([
            'badge' => 'Test Badge',
            'title_line_1' => 'Title 1',
            'title_line_2' => 'Title 2',
            'description' => 'Description',
            'btn_primary_text' => 'Button',
            'btn_primary_url' => 'https://example.com',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $this->assertSame('Test Badge', $slide->badge);
        $this->assertSame('Title 1', $slide->title_line_1);
        $this->assertSame('Title 2', $slide->title_line_2);
        $this->assertTrue($slide->is_active);
        $this->assertSame(1, $slide->sort_order);
    }

    public function test_hero_slide_scope_active_returns_only_active_slides(): void
    {
        $this->assertTrue(HeroSlide::active()->get()->isEmpty());
    }

    public function test_hero_slide_scope_ordered_orders_by_sort_order(): void
    {
        $this->assertTrue(HeroSlide::ordered()->get()->isEmpty());
    }
}
