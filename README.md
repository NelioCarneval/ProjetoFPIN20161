# Sistema Online de Adoção de Animais - ONG

Projeto de FPIN 2016.1 - Sistemas de Informação, IFAL

Objetivo: Desenvolver um sistema que auxilie a adoção de animais na web, bem como na administração de ONG’s com tal objetivo.

Integrantes da equipe:

	Emmanuel Alves
		- emmanuel.sevla@gmail.com
	Felipe Carvalho
		- felipekstrue@gmail.com
		- felipecavalcanti100@gmail.com
	Nélio Carneval
		- carnevalle18@gmail.com
		- nelio_carneval@hotmail.com
	Pedro Ivo
		- pedroivohp@gmail.com
		- pedroivo-hp@hotmail.com

Framework utilizado: Globo Bootstrap - http://globocom.github.io/bootstrap/

Processo de configuração para que o programa possa ser instalado e executado:

	1. Colocar a pasta do projeto na pasta htdocs do XAMPP
	2. Executar o XAMPP e ligar o Apache e o MySQL
	3. No navegador acessar "http://localhost/phpmyadmin/"
	4. Na guia "Importar" do phpMyAdmin, clicar em "Escolher arquivo" e selecionar o Script que está em "database/Script_(melhor_amigo).sql" e clicar em Executar
	5. Pronto! O banco de dados ja está criado e pronto para funcionar!

Usuários que pré-existentes no banco de dados:

	Email: adotante@fpin.com | Senha: "1234qwer"
		- Tipo de usuário: Comum

	Email: "padrinho@fpin.com" | Senha: "1234qwer"
		- Tipo de usuário: Padrinho

	Email: voluntario@fpin.com | Senha: "1234qwer"
		- Tipo de usuário: Voluntário

	Email: admin@fpin.com | Senha: "1234qwer"
		- Tipo de usuário: Administrador

	Email: jose@fpin.com | Senha: "1234qwer"
		- Tipo de usuário: Comum

	Email: maria@fpin.com | Senha: "1234qwer"
		- Tipo de usuário: Comum

Descrição do problema / Justificativa:

	A superpopulação do Centro de Controle de Zoonoses não é mais uma possibilidade e sim um fato. A remediação para tal problema não é de agradar àqueles que se
	preocupam com o bem-estar destes animais, como por exemplo, o sacrifício. Diante do extermínio e maus tratos desses, há a necessidade de utilizar tecnologias 
	que auxiliem ONG’s destinadas a reduzir o sofrimento dos animais, além de levar alegria a novos lares.

Usuários do Sistema:

	- Responsáveis pelo Sistema de Adoção (Administradores)
	- Voluntários
	- Padrinhos
	- Usuários Comuns (Que desejam adotar, apadrinhar ou se voluntariar)
	- Usuários Anônimos

Funcionalidades para usuário anônimo:

	- Acesso limitado
	- Vizualização de Cães disponíveis para adoção, bem como as informações de cada um
	- Realização de Cadastro e Login

Funcionalidades para usuário comum:

	- Enviar solicitações de adoção
	- Possibilidade de apadrinhar um cão
	- Enviar pedidos para se tornar voluntário da ONG
	- Visualizar seus dados (Que foram fornecidos na hora do cadastro)
	- Opção de alterar seus dados

Funcionalidades para padrinhos:

	- Visualizar do Cão apadrinhado
	- Visualizar seus dados de apadrinhamento
	- Opção de mudar os seus dados de apadrinhamento
	- Possibilidade de deixar de ser padrinho

Funcionalidades para voluntários:

	- Visualizar seus dados de voluntário
	- Opção de mudar os seus dados de voluntário
	- Possibilidade de deixar de ser voluntário

Funcionalidades para administradores:

	- Listar usuários
	- Listar padrinhos
	- Listar voluntários
	- Banir usuários
	- Cadastrar cães no sistema
	- Modificar informações de cães
	- Visualizar, aceitar ou recusar solicitações de adoção
	- Visualizar, aceitar ou recusar pedidos para ser voluntário 