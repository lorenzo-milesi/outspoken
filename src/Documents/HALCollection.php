<?php

namespace IloveCode\Outspoken\Documents;

use Illuminate\Database\Eloquent\Collection;
use IloveCode\Outspoken\ApiAction;
use IloveCode\Outspoken\ApiLink;
use ReflectionException;
use ReflectionMethod;

class HALCollection
{
    public function __construct(
        public readonly string $class,
        public readonly Collection $items,
        public readonly array $body = []
    ) { }

    public function actions(string $action): array
    {
        $baseRoute = config('outspoken.default_api_route');

        $controller = $this->body['actions'] ?? null;

        try {
            $method = new ReflectionMethod($controller, $action);
        } catch (ReflectionException) {
            $method = null;
        }

        $links = $method->getAttributes(ApiLink::class);

        $actions = [];
        foreach ($links as $link) {
            try {
                $linkedMethod = new ReflectionMethod($controller, $link->getArguments()[0]);
            } catch (ReflectionException)
            {
                $linkedMethod = null;
            }

            $apiActionAttributes = $linkedMethod->getAttributes(ApiAction::class);
            $apiAction = $apiActionAttributes ? $apiActionAttributes[0] : null;

            $route = '/' . $baseRoute . '/' . $apiAction->getArguments()[0];

            $actions[$linkedMethod->name] = [
                'href' => $route
            ];

            if($apiAction->getArguments()[1] !== 'GET') {
                $actions[$linkedMethod->name]['method'] = $apiAction->getArguments()[1];
            }
        }

        return [
            '_links' => $actions
        ];
    }

}
