<?php

namespace App\Http\Controllers;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
use App\Models\Vaccination;

class LocationController extends Controller
{
    public function index()
    {
        /* load all locations and relations with eager loading,
        which means "load all related objects" */
        $locations = Location::with(['vaccinations'])
            ->get();
        return $locations;
    }



    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }

    public function findById(int $id):Location{
        $loc = Location::where('id', $id)->with(['vaccinations'])->first();
        return $loc;
    }

    public function save(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $location = Location::create($request->all());
            // save vaccinations from location
            if (isset($request['vaccinations']) && is_array($request['vaccinations'])) {
                foreach ($request['vaccinations'] as $vacc) {
                    $vaccination =
                        Vaccination::firstOrNew(['max_participants' => $vacc['max_participants'], 'date' => $vacc['date'],
                            'time' => $vacc['time']]);
                    $location->vaccinations()->save($vaccination);
                }
            }
            DB::commit();
            // return a vaild http response
            return response()->json($location, 201);
        } catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving vaccination failed: " . $e->getMessage(), 420);
        }
    }

    public function update(Request $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $location = Location::with(['vaccinations'])
                ->where('id', $id)->first();
            if ($location != null) {
                $location->update($request->all());
            }
            DB::commit();
            $loc1 = Location::with(['vaccinations'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($loc1, 201);
        } catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating location failed: " . $e->getMessage(), 420);
        }
    }





    public function delete(int $id) : JsonResponse
    {
        $location = Location::where('id', $id)->first();
        if ($location != null) {
            $location->delete();
        }
        else
            throw new \Exception("location couldn't be deleted!");
        return response()->json('location (' . $id . ') successfully deleted', 200);
    }


}
