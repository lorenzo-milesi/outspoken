<?php

namespace IloveCode\Outspoken\Tests\app\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasGenericFields
{
    public function id(): Attribute
    {
        return Attribute::make(get: fn () => 1);
    }

    public function title(): Attribute
    {
        return Attribute::make(get: fn () => 'This is a super title');
    }

    public function description(): Attribute
    {
        return Attribute::make(get: fn () => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut velit libero, vulputate ac rutrum eget, sodales sit amet nulla. Nam imperdiet dapibus convallis. Fusce nec turpis vitae enim sollicitudin dapibus. Proin et sollicitudin magna. Etiam bibendum hendrerit luctus. Praesent sodales sem gravida enim efficitur, ut lobortis justo venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum bibendum arcu a cursus porttitor. Nulla sit amet placerat ligula. Aliquam sit amet ante at purus eleifend viverra. Nulla placerat a odio sed finibus. Nullam nec nunc in orci mattis suscipit id eget orci. Aenean sapien massa, maximus sed sollicitudin eget, molestie non sapien.');
    }
}
