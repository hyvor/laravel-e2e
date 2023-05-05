<?php declare(strict_types=1);

namespace Hyvor\LaravelE2E;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class Controller
{

    public function artisan(Request  $request) : JsonResponse
    {

        $command = (string) $request->string('command');
        $parameters = (array) $request->input('parameters');

        $exitCode = Artisan::call($command, $parameters);

        return Response::json([
            'code' => $exitCode,
            'output' => Artisan::output(),
        ]);

    }

    public function truncate(Request $request) : JsonResponse
    {

        $data = $request->validate([
            'connections' => 'nullable|array',
            'connections.*' => 'nullable|string'
        ]);

        $connections = $data['connections'] ?? [null];

        $truncate = new Services\Truncate();
        $truncate->truncate($connections);

        return Response::json();

    }

    public function factory(Request $request) : JsonResponse
    {

        $modelClass = (string) $request->string('model');
        $count = $request->has('count') ? $request->integer('count') : null;
        $attrs = (array) $request->input('attrs');

        if (!class_exists($modelClass)) {
            $modelClass = 'App\\Models\\' . $modelClass;
        }

        if (!class_exists($modelClass)) {
            abort(422, 'Model not found');
        }

        $model = app($modelClass);

        if (!$model instanceof Model) {
            abort(422, 'Model not found');
        }

        if (!method_exists($model, 'factory')) {
            abort(422, 'Model factory not found');
        }

        /** @var Factory<Model> $modelFactory */
        $modelFactory = $model->factory();

        if ($count !== null) {
            $modelFactory = $modelFactory->count($count);
        }

        $models = $modelFactory->create($attrs);

        return Response::json($models);

    }

    public function query(Request $request) : JsonResponse
    {

        $connection = $request->has('connection') ?
            (string) $request->string('connection') :
            null;
        $query = (string) $request->string('query');

        $results = DB::connection($connection)->statement($query);

        return Response::json($results);

    }

    public function select(Request $request) : JsonResponse
    {

        $connection = $request->has('connection') ?
            (string) $request->string('connection') :
            null;
        $query = (string) $request->string('query');

        $results = DB::connection($connection)->select($query);

        return Response::json($results);

    }

}