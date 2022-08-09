<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Response;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::where('gerente_id', '!=' , 1)->get();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();

        //dd($input);

        $input['password'] = Hash::make($input['password']);
        $user = $this->userRepository->create($input);
        //$user = $this->userRepository->create($input);
        //dd($user);
        Flash::success('Usuario agregado correctamente.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = DB::table('users')
            ->where('id','=', $id)
            ->get();
        //dd($user);
        //$user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('users', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $input = \request()->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => '',
        ]);

        //dd($input);
        //$user = $this->userRepository->find($id);
        $user = DB::table('users')->select('id', 'name', 'email', 'password')->where('id', '=', $id)->get();
        //dd($user);

        if (empty($user)) {
            Flash::error('Usuario no encontrado');

            return redirect(route('users.index'));
        }

        if ($input['name'] != null) {
            $up = DB::table('users')
                ->where('id', '=', $id)
                ->update(['name' => $input['name']]);
        }
        if ($input['email'] != null) {
            $up = DB::table('users')
                ->where('id', '=', $id)
                ->update(['email' => $input['email']]);
        }
        if ($input['password'] != null) {
            $up = DB::table('users')
                ->where('id', '=', $id)
                ->update(['password' => Hash::make($input['password'])]);
        }
        //$user = $this->userRepository->update($request->all(), $id);


        Flash::success('Usuario actualizado correctamente.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Usuario eliminado exitosamente');

        return redirect(route('users.index'));
    }
}
