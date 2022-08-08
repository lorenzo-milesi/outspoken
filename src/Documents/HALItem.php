<?php

namespace IloveCode\Outspoken\Documents;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use IloveCode\Outspoken\ApiAction;
use IloveCode\Outspoken\ApiLink;
use IloveCode\Outspoken\Helpers\Arr as ILoveCodeArr;
use ReflectionException;
use ReflectionMethod;

class HALItem
{
    public function __construct(
        public readonly mixed $model,
        public readonly array $body = []
    ) {
    }

    public function fields(): array
    {
        $map = [];

        if (isset($this->body['fields'])) {
            $fields = ILoveCodeArr::toAssociativeArray($this->body['fields']);
            $map = Arr::map($fields, fn ($field) => $this->model->$field);
        }

        return $map;
    }

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
                    'href' => $this->routeBindModel($route)
            ];

            if(isset($apiAction->getArguments()[1]) && $apiAction->getArguments()[1] !== 'GET') {
                $actions[$linkedMethod->name]['method'] = $apiAction->getArguments()[1];
            }

        }

        return [
            '_links' => $actions
        ];
    }

    public function name(): string
    {
        return $this->body['name'] ?? Str::kebab(class_basename($this->model));
    }

    private function routeBindModel(string $route): string
    {
        return Str::replace('{id}', $this->model->id, $route);
    }
}
