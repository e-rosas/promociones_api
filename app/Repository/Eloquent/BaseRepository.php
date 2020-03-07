<?php

namespace App\Repository\Eloquent;

use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BaseRepository implements EloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * @param $id
     *
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    /**
     * get all the items collection from database table using model.
     *
     * @return Collection of items
     */
    public function get(): ?Collection
    {
        return $this->model->get();
    }

    /**
     * get collection of items in paginate format.
     *
     * @return Collection of items
     */
    public function paginate(Request $request)
    {
        return $this->model->paginate($request->input('limit', 10));
    }

    /**
     * create new record in database.
     *
     * @param Request $request Illuminate\Http\Request
     *
     * @return saved model object with data
     */
    public function store(Request $request)
    {
        $data = $this->setDataPayload($request);
        $item = $this->model;
        $item->fill($data);
        $item->save();

        return $item;
    }

    /**
     * update existing item.
     *
     * @param int     $id      integer item primary key
     * @param Request $request Illuminate\Http\Request
     *
     * @return send updated item object
     */
    public function update($id, Request $request)
    {
        $data = $this->setDataPayload($request);
        $item = $this->model->findOrFail($id);
        $item->fill($data);
        $item->save();

        return $item;
    }

    /**
     * get requested item and send back.
     *
     * @param int $id: integer primary key value
     *
     * @return send requested item data
     */
    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Delete item by primary key id.
     *
     * @param int $id integer of primary key id
     *
     * @return bool
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * set data for saving.
     *
     * @param Request $request Illuminate\Http\Request
     *
     * @return array of data
     */
    protected function setDataPayload(Request $request)
    {
        return $request->all();
    }
}
