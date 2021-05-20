<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Models\Vaccination;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        /* load all locations and relations with eager loading,
        which means "load all related objects" */
        $users = User::all();
        return $users;
    }

    public function findById(int $id):User{
        $user = User::where('id', $id)->with(['vaccination'])->first();
        return $user;
    }

    public function save(Request $request): JsonResponse
    {
        DB::beginTransaction();
        try {
            $user = User::create($request->all());

            DB::commit();
            // return a vaild http response
            return response()->json($user, 201);
        } catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("saving user failed: " . $e->getMessage(), 420);
        }
    }

    public function update(Request $request, int $id): JsonResponse
    {
        DB::beginTransaction();
        try {
            $user = User::get()
                ->where('id', $id)->first();
            if ($user != null) {
                $user->update($request->all());
            }
            DB::commit();
            $u = User::get()
                ->where('id', $id)->first();

            return response()->json($u, 201);
        } catch (\Exception $e) {
            // rollback all queries
            DB::rollBack();
            return response()->json("updating user failed: " . $e->getMessage(), 420);
        }
    }

    public function delete(int $id) : JsonResponse
    {
        $user = User::where('id', $id)->first();
        if ($user != null) {
            $user->delete();
        }
        else
            throw new \Exception("user couldn't be deleted!");
        return response()->json('user (' . $id . ') successfully deleted', 200);
    }

}
