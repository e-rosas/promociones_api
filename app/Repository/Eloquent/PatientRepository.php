<?php

namespace App\Repository\Eloquent;

use App\Patient;
use App\Repository\PatientRepositoryInterface;
use Illuminate\Http\Request;

class PatientRepository extends BaseRepository implements PatientRepositoryInterface
{
    /**
     * PatientRepository constructor.
     */
    public function __construct(Patient $model)
    {
        parent::__construct($model);
    }

    /**
     * set payload data for posts table.
     *
     * @param Request $request [birth_date]
     *
     * @return array of data for saving
     */
    protected function setDataPayload(Request $request)
    {
        return [
            'name' => $request->input('name'),
            'birth_date' => $request->input('birth_date'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'insured' => $request->input('insured'),
        ];
    }
}
