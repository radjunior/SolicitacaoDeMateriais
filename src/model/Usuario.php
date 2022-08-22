<?php

namespace USCO\Solic\Model;

class Usuario
{
    private string $id;
    private string $nome;
    private string $apelido;
    private string $login;
    private string $senha;
    private string $nivelAcesso;
    private string $situacao;
    private string $resetSenha;

    public function __construct()
    {
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getApelido()
    {
        return $this->apelido;
    }

    public function setApelido($apelido)
    {
        $this->apelido = $apelido;

        return $this;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    public function getNivelAcesso()
    {
        return $this->nivelAcesso;
    }

    public function setNivelAcesso($nivelAcesso)
    {
        $this->nivelAcesso = $nivelAcesso;

        return $this;
    }

    public function getSituacao()
    {
        return $this->situacao;
    }

    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;

        return $this;
    }

    public function getResetSenha()
    {
        return $this->resetSenha;
    }

    public function setResetSenha($resetSenha)
    {
        $this->resetSenha = $resetSenha;

        return $this;
    }
}
