<?php

namespace App\Repository\Eloquent;

use App\Patient;
use App\Repository\PatientRepositoryInterface;

class PatientRepository extends BaseRepository implements PatientRepositoryInterface
{
    /**
     * PatientRepository constructor.
     */
    public function __construct(Patient $model)
    {
        parent::__construct($model);
    }
}
