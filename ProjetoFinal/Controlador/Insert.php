<?php
  $bd = CriaConexãoBD();
          $sql->$bd->prepare
            ("INSERT INTO usuário (nome, sobrenome, usuario, email, senha, instituicao) VALUES (:valnome, :valsobrenome, :valusuario, :valemail, :valsenha);");
          $sql->bindValue(':valnome', $dadosNovoContato['nome']);
          $sql->bindValue(':valsobrenome', $dadosNovoContato['sobrenome']);
          $sql->bindValue(':valusuario', $dadosNovoContato['usuario']);
          $sql->bindValue(':valemail', $dadosNovoContato['email']);
          $sql->bindValue(':valsenha', $dadosNovoContato['senha']);
          $sql->execute();
        }
?>
