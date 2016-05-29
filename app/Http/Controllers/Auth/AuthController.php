<?php

namespace Wallet\Http\Controllers\Auth;

use Validator;
use Wallet\Models\User;
use Illuminate\Http\Request;
use Wallet\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Redirect the register route to register section on main page.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function redirectToRegister()
    {
        return redirect()->route('site', ['#register']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, $this->getValidatorRules(), $this->getValidatorMessages());
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $carbon = app(\Carbon\Carbon::class);

        return User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'cpf'        => $data['cpf'],
            'birthdate'  => $carbon->createFromFormat('d/m/Y', $data['birthdate'])->format('Y-m-d'),
            'email'      => $data['email'],
            'cep'        => $data['cep'],
            'password'   => bcrypt($data['password']),
        ]);
    }

    /**
     * Get the rules of the validator.
     *
     * @return array
     */
    private function getValidatorRules()
    {
        return [
            'first_name'            => 'required|max:80',
            'last_name'             => 'required|max:80',
            'cpf'                   => 'required|cpf|formato_cpf|unique:users',
            'birthdate'             => 'required|date|date_format:"d/m/Y"',
            'email'                 => 'required|email|max:255|unique:users',
            'cep'                   => 'required|min:8|numeric',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password'
        ];
    }

    /**
     * Get the messages of the validator.
     *
     * @return array
     */
    private function getValidatorMessages()
    {
        return [
            'first_name.required'            => 'O primeiro nome é obrigatório.',
            'first_name.max'                 => 'O primeiro nome pode conter até 80 caracteres.',

            'last_name.required'             => 'O último nome é obrigatório.',
            'last_name.max'                  => 'O último nome pode conter até 80 caracteres.',

            'cpf.required'                   => 'O CPF é obrigatório.',
            'cpf.cpf'                        => 'O CPF não é válido.',
            'cpf.formato_cpf'                => 'O CPF não está com um formato válido.',
            'cpf.unique'                     => 'O CPF já foi cadastrado.',

            'birthdate.required'             => 'A data de nascimento é obrigatória.',
            'birthdate.date'                 => 'A data de nascimento não está no formato correto.',
            'birthdate.date_format'          => 'A data de nascimento deve estar no formato d/m/Y.',

            'email.required'                 => 'O email é obrigatório.',
            'email.email'                    => 'O email não é válido.',
            'email.max'                      => 'O email deve conter no máximo 255 caracteres.',
            'email.unique'                   => 'O email já está em uso.',

            'cep.required'                   => 'O CEP é obrigatório',
            'cep.min'                        => 'O CEP deve conter 8 números.',
            'cep.numeric'                    => 'O CEP deve conter apenas números.',

            'password.required'              => 'A senha é obrigatória.',
            'password.min'                   => 'A senha deve conter no mínimo 6 caracteres.',
            'password.confirmed'             => 'Confirme sua senha.',

            'password_confirmation.required' => 'Confirme sua senha.',
            'password_confirmation.min'      => 'As senhas devem ser iguais.',
            'password_confirmation.same'     => 'As senhas devem ser iguais.',
        ];
    }

    /**
     * {@inheritdoc}
     */
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'O email é obrigatório.',
            'password.required' => 'A senha é obrigatória.',
        ]);
    }
}
