<?php

namespace App\Http\Controllers;

use App\Models\Vaccination;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class VaccinationController extends Controller
{
    public function index(){
        /*$vaccinations = Vaccination::all();
        return view('vaccinations.index', compact('vaccinations'));*/
        $vaccinations = Vaccination::with(['location', 'users'])->get();
        return $vaccinations;
    }

    public function findById(int $id):Vaccination{
        $vacc = Vaccination::where('id', $id)->with(['location', 'users'])->first();
        return $vacc;

}

    public function show($vaccination){
        $vaccination = Vaccination::find($vaccination);
        return view('vaccination.show', compact('vaccination'));
    }

    /**
     * create new Vaccination -- funktioniert noch nicht
     */
    public function save(Request $request) : JsonResponse  {
        $request = $this->parseRequest($request);
        /*+
        *  enteder es geht alles gut oder es wird nicht ausgeführt und alles zurückgesetzt
        */
        DB::beginTransaction();
        try {
            //Buchproperties ablesen
            $vaccination = Vaccination::create($request->all());

            if (isset($request['users']) && is_array($request['users'])) {
                foreach ($request['users'] as $user) {
                    $user = User::firstOrNew(['svnr'=>$user['svnr'],'gender'=>$user['gender'],'firstname'=>$user['firstname'],
                        'lastname'=>$user['lastname'],'street'=>$user['street'],'number'=>$user['number'], 'u_plz'=>$user['u_plz'], 'u_city'=>$user['u_city'], 'birth'=>$user['birth'],
                        'phonenumber'=>$user['phonenumber'],'email'=>$user['email'],'password'=>$user['password'],'hasvaccination'=>$user['hasvaccination'],'isadmin'=>$user['isadmin'], 'vaccination_id'=>$user['vaccination_id']]);
                    $vaccination->users()->save($user);
                }
            }

            DB::commit();
            // return a vaild http response
            return response()->json($vaccination, 201);
        }
        catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving vaccination failed: " . $e->getMessage(), 420);
        }
    }

    /**
     * modify / convert values if needed
     * konvertiert in Timestamp Model
     */

    private function parseRequest(Request $request) : Request {
        // get date and convert it - its in ISO 8601, e.g. "2018-01-01T23:00:00.000Z
        $date = new \DateTime($request->date);
        $request['date'] = $date;
        $time = new \DateTime($request->time);
        $request['time'] = $time;
        return $request;
    }


    public function update(Request $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $vaccination = Vaccination::with(['users'])
                ->where('id', $id)->first();
            if ($vaccination != null) {
                $request = $this->parseRequest($request);
                $vaccination->update($request->all());
            }
            DB::commit();
            $vac1 = Vaccination::with(['users'])
                ->where('id', $id)->first();
            // return a vaild http response
            return response()->json($vac1, 201);
        } catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating vaccination failed: " . $e->getMessage(), 420);
        }
    }


    /**
     * returns 200 if vaccination deleted successfully, throws excpetion if not -- funktioniert
     */
    public function delete(int $id) : JsonResponse
    {
        $vacc = Vaccination::where('id', $id)->first();
        if ($vacc != null) {
            $vacc->delete();
        }
        else
            throw new \Exception("vaccination couldn't be deleted!");
        return response()->json('vaccination (' . $vacc . ') successfully deleted', 200);
    }
}
