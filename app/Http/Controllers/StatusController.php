<?php

namespace App\Http\Controllers;

use App\Models\Internship;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Internship $internship)
    {
        $user = Auth::User();
        if(
            $internship->minimum_year <= $user->current_year &&
            ($internship->required_faculty == 'Any' || $internship->required_faculty == $user->faculty) &&
            ($internship->required_department == 'Any' || $internship->required_department == $user->faculty_department)
        ) {
            Status::create([
                'internship_id' => $internship->id,
                'user_id' => Auth::id(),
                'current_status' => 'Started',
            ]);
        }
        return redirect()->route('internship.list');
    }

    /**
     * Display the specified resource.
     *
     * @param Status $status
     * @return Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Status $status
     * @return Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Status $status
     * @return Response
     */
    public function update($status)
    {
        if ($status->current_status != 'Ended') {
            $internship = $status->internship;
            $user = Auth::User();
            if (
                $internship->minimum_year <= $user->current_year &&
                ($internship->required_faculty == 'Any' || $internship->required_faculty == $user->faculty) &&
                ($internship->required_department == 'Any' || $internship->required_department == $user->faculty_department)
            ) {
                if ($status->current_status == 'Started') {
                    $status->current_status = 'In progress';
                } elseif ($status->current_status == 'In progress') {
                    $status->current_status = 'Ended';
                } else {
                    $status->current_status = 'Started';
                }
                $status->save();
            }
        }
        return redirect()->route('internship.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Status $status
     * @return Response
     */
    public function destroy(Status $status)
    {
        //
    }

    public function toggle(Internship $internship) {
        if($internship->statuses->isEmpty()) {
            return $this->store($internship);
        }
        else {
            return $this->update($internship->statuses[0]);
        }
    }
}
