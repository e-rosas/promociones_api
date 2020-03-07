<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePatient;
use App\Repository\Eloquent\PatientRepository;
use Illuminate\Http\Request;
use Throwable;

class PatientController extends Controller
{
    protected $repository;

    public function __construct(PatientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * get list of all the patients.
     *
     * @param $request: Illuminate\Http\Request
     *
     * @return json response
     */
    public function index(Request $request)
    {
        $patients = $this->repository->paginate($request);

        return response()->json(['patients' => $patients]);
    }

    /**
     * store patient data to database table.
     *
     * @param $request: App\Http\Requests\CreatepatientRequest
     *
     * @return json response
     */
    public function store(StorePatient $request)
    {
        try {
            $patient = $this->repository->store($request);

            return response()->json(['patient' => $patient]);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * update patient data to database table.
     *
     * @param $request: App\Http\Requests\UpdatepatientRequest
     * @param mixed $id
     *
     * @return json response
     */
    public function update($id)
    {
    }

    /**
     * get single patient by id.
     *
     * @param int $id: integer patient id
     *
     * @return json response
     */
    public function show($id)
    {
        try {
            $patient = $this->repository->show($id);

            return response()->json(['patient' => $patient]);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }

    /**
     * delete patient by id.
     *
     * @param int $id: integer patient id
     *
     * @return json response
     */
    public function delete($id)
    {
        try {
            $this->repository->delete($id);

            return response()->json([], 204);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()], $e->getStatus());
        }
    }
}
