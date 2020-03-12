<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatient;
use App\Http\Resources\PatientResource;
use App\Patient;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patients = $this->repository->paginate($request);

        return response()->json(['patients' => $patients]);
        /* $patients = Patient::all();

        return PatientResource::collection($patients); */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StorePatient $request)
    {
        try {
            $patient = $this->repository->store($request);

            return response()->json(['patient' => $patient]);
        } catch (Throwable $e) {
            return response()->json(['message' => $e->getMessage()]);
        }
        // Retrieve the validated input data...
        /* $validated = $request->validated();
        Patient::create($validated);
        $response = [
            'success' => true,
            'message' => 'Registered successfully.',
        ];

        return response()->json($response, 200); */
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
