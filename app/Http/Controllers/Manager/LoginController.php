<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use App\Repositories\User\UserRepository;
use App\Repositories\Employee\EmployeeRepository;

class LoginController extends Controller
{
    /** @var UserRepository */
    private $userRepository;

    /** @var EmployeeRepository */
    private $employeeRepository;

    public function __construct(UserRepository $userRepository, EmployeeRepository $employeeRepository)
    {
        Self::middleware('guest')->only(['index','authentication']);
		Self::middleware('auth')->only(['home','logout']);

        $this->userRepository = $userRepository;
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Template de login
     * @return string
     */
    public function index(): string
    {
        return view('manager.login')->render();
    }

    /**
     * Método de autenticación
     * @return JsonResponse
     */
    public function authentication(Request $request): JsonResponse
    {
        $validator = \Validator::make($request->all(),[
			'email'=>'required|string',
			'password'=>'required|string'
		],[
			'required'=> 'Obligatorio'
		]);

		if ($validator->fails()) {

			return response()->json(['status'=>STATUS_FAIL,'errors'=>$validator->errors()]);
		}

        $userRegistry = $this->userRepository->getByEmailWithEmployee($request->email);

        if ($userRegistry) {

            $credentials = [
				'user_login'=>$userRegistry->user_login,
				'password'=>$request->password,
				'user_id'=>$userRegistry->user_id
			];

            if (!\Auth::attempt($credentials,false)) {

                return response()->json([
                    'status'=>STATUS_FAIL,
                    'msg'=>'Usuario no autenticado'
                ], Response::HTTP_UNAUTHORIZED);
            }

            session()->regenerate();
			session(['user'=>$userRegistry]);

            return response()->json([
                'status'=>STATUS_OK,
                'msg'=>'Usuario autenticado'
            ], Response::HTTP_ACCEPTED);
        }

        return response()->json(['status'=>STATUS_FAIL], Response::HTTP_NOT_FOUND);
    }

    /**
     * Template de home
     * @return string|JsonResponse
     */
    public function home(): string|JsonResponse
    {
        $view = view('manager.home')->render();

        if (request()->ajax()) {
            return response()->json(['status'=>STATUS_OK,'html'=>$view]);
        } else {
            //dd('fsdf');
            return $view;
        }
    }

    /**
     * Cierre de sessión de usuarios.
     * @return Response
     */
    public function logout(Request $request): Response
    {
        Auth::logout();

        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

		return redirect()->route('manager.index');
    }

    /**
     * Cambio de idioma en sesion
     * @return JsonResponse
     */
    public function changeLenguage(Request $request): JsonResponse
    {
        $validator = \Validator::make($request->all(),[
            'idLeng'=>'required'
        ]);

        if ($validator->fails()) {

            return response()->json(['status'=>STATUS_FAIL,'msg'=>'Faltan datos necesarios'],Response::HTTP_BAD_REQUEST);
        }

        $employee = session('user')->employee;
        $lenguage = $this->employeeRepository->getLenguage($employee, $request);

        if (!is_null($lenguage)) {

            $this->employeeRepository->changeLenguages($employee, DB_FALSE);
            $this->employeeRepository->changeLenguage($employee, $lenguage, DB_TRUE);

            $user = $this->userRepository->findUserWithEmployeeById(session('user')->user_id);
            session(['user'=>$user]);

            return response()->json(['status'=>STATUS_OK],Response::HTTP_RESET_CONTENT);
        }

        return response()->json(['status'=>STATUS_FAIL,'msg'=>'Registro de idioma no encontrado'],Response::HTTP_NOT_FOUND);
    }
}
