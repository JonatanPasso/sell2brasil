<?php

namespace App\Http\Controllers;

use App\Entities\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    public function listarPessoas()
    {
        $pessoas = \DB::table('sell_pessoas');
        return $pessoas->get();
    }

    public function listaPessoaPorId(Request $request)
    {
        $pessoa = Pessoa::listaPessoaPorId($request);

        return $pessoa;
    }

    public function incluirPessoa(Request $request)
    {
        $cadastrado = Pessoa::verificaCadastro($request->email);

        if($cadastrado != NULL)
        {
            return $error = ['error' => 'Pessoa já cadastrada!'];
        }

        $pessoa = new Pessoa();

        $pessoa->nome = $request->nome;
        $pessoa->sobrenome = $request->sobrenome;
        $pessoa->email = $request->email;
        $pessoa->endereco = $request->endereco;
        $pessoa->cidade = $request->cidade;
        $pessoa->estado = $request->estado;
        $pessoa->cep = $request->cep;

        \DB::beginTransaction();

        $pessoa->save();

        \DB::commit();

        return $pessoa;

    }

    public function alterarDadosPessoa(Request $request)
    {

        $pessoa = Pessoa::listaPessoaPorId($request);

        $pessoa->nome = $request['nome'];
        $pessoa->sobrenome = $request['sobrenome'];
        $pessoa->email = $request['email'];
        $pessoa->endereco = $request['endereco'];
        $pessoa->cidade = $request['cidade'];
        $pessoa->estado = $request['estado'];
        $pessoa->cep = $request['cep'];

        \DB::beginTransaction();

        $pessoa->save();

        \DB::commit();

        return $pessoa;
    }

    public function excluirPessoa(Request $request)
    {
        $pessoa = Pessoa::listaPessoaPorId($request);

        \DB::beginTransaction();

        $pessoa->delete();

        \DB::commit();

        return $pessoa;
    }
}
