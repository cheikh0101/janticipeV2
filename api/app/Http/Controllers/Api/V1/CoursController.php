<?php

namespace App\Http\Controllers\Api\V1;

use App\Custom\CustomResponse;
use App\Http\Controllers\Controller;
use App\Models\AnneeAcademique;
use App\Models\Cour;
use App\Models\Type;
use Illuminate\Http\Request;

class CoursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cours = Cour::inRandomOrder()->get();
        return CustomResponse::buildSuccessResponse($cours);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cour  $cour
     * @return \Illuminate\Http\Response
     */
    public function show(Cour $cour)
    {
        $types = Type::all();
        $anneeAcademiques = AnneeAcademique::all();
        return CustomResponse::buildSuccessResponse($cour);
    }

    public function search(Request $request)
    {
        $request->validate([
            'motCle' => 'required|min:2'
        ]);
        $motCle = $request->motCle;
        $cours = Cour::where('name', 'like', '%' . $motCle . '%')->get();
    }

    public function paginate($itemPerPage)
    {
        $cours = Cour::paginate($itemPerPage);
        return CustomResponse::buildSuccessResponse($cours);
    }

    public function filtreParNiveau(Request $request)
    {
        // return $request;
        $cours = Cour::whereId($request->id)->inRandomOrder()->get();
        return CustomResponse::buildSuccessResponse($cours);
    }
}
