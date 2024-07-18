<?php

namespace App\Http\Controllers;

use App\Models\Attributes\Identifier;
use App\Models\Contracts\Model;
use App\Models\BaseModel;
use App\Models\Repositories\BaseModelRepository;
use App\States\BaseModelProcessor;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

abstract class ResourceController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(
        protected readonly BaseModelRepository $repository,
        protected readonly BaseModelProcessor $processor,
    )
    {
    }

    public function index(Request $request): Arrayable
    {
        return $this->repository
            ->paginate(
                $request->get('pageSize', 10),
                $request->get('page', 1),
            );
    }

    public function store(Request $request): BaseModel
    {
        $request->validate(
            $this->validationRules()
        );
        return $this->processor->create($request->all());
    }

    public function show(int $id): Model
    {
        return $this->repository->findOrFail(new Identifier($id));
    }

    public function update(Request $request, int $id): BaseModel
    {
        $model = $this->repository->findOrFail(new Identifier($id));
        $this->processor->update(
            $model,
            $request->all(),
        );

        return $model->refresh();
    }

    public function destroy(int $id): array
    {
        $model = $this->repository->findOrFail(new Identifier($id));

        return [
            'success' =>$this->processor->destroy($model),
        ];
    }

    abstract protected function validationRules(): array;
}
