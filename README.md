# ProjetoVerthandi
Projeto básico de PHP feito no semestre III da faculdade de Análise e desenvolvimento de sistemas.

#### Disciplina: Desenvolvimento para Web PL 1/2021 - Casca
#### Professor: @guimadalozzo

## Descrição:

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Projeto Verthandi se baseia em um pequeno sistema capaz de administrar mídias de usuários cadastros, mídias essas que podem ser cadastradas pelo próprio usuário, para que ele possa catalogar somente aquilo que é o foco de seu entretenimento, seja ele um filme, um anime, ou até mesmo um livro ou revista. Ele também poderá cadastrar seus próprios tipos de mídias, para que ele possa somente cadastrar por exemplo, livros, se for de seu interesse.

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Por fim, o projeto não se baseia somente na função de catalogar, o sistema fornecerá para o usuário também um campo de avaliação, para que ali ele escreva aquilo que quiser sobre a mídia consumida e suas experiências com a mesma e, um campo que receberá uma nota numérica de 0 até 10.


## Objetivos:

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;O objetivo principal do projeto é o de propor uma forma mais personalizável de se armazenar experiências de mídia, se o usuário deseja apenas guardar seus livros, ele poderá, se deseja guardar livros e filmes, também poderá, e assim por diante. Além de dar a possibilidade de o usuário armazenar suas opiniões quanto aquilo que ele consumiu, para que possa ser visto quando ele bem entender, seja isso, 10 dias, 10 meses, ou 10 anos após o cadastro. 


## Justificativas:

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Na internet existem muitos sistemas capazes de registrar atividade de consumo de mídia, mas todos eles possuem um público alvo, um grupo de pessoas familiarizadas com o meio de consumo, o Projeto Verthandi se mostra útil quando o tópico é o de unir públicos-alvo.


## Escopo Geral:

### Funções
#### 1. Autocadastro:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O sistema deverá ser capaz de fornecer que o usuário não cadastro possa fazer seu autocadastro caso nãp possua uma no sistema.

#### 2. Login:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O sistema deverá ser capaz de receber informações de Login e permitir acesso caso as informações coincidam com alguma conta já cadastrada. Caso os dados não coincidam com nenhum no banco de dados, o sistema deve mostrar uma imagem de erro e propor a opção de autocadastro ao usuário.

#### 3. Logout:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O sistema deverá ser capaz de realizar o logout de um usuário cadastrado já logado. E no final do processo, redirecionar o usuário para a tela de login.

#### 4. Exclusão de Usuário:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O sistema deverá ser capaz de permitir que o usuário logado possa realizar sua própria exclusão de conta.

#### 5. Edição de Usuário:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O sistema deverá ser capaz de permitir que o usuário logado possa realizar sua própria edição de informações de seu cadastro.

#### 6. Manutenção de Mídia:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O sistema deverá ser capaz de permitir que o usuário logado possa adicionar, excluir, editar e listar mídias. A mídia deverá possuir:
- Indentificador próprio
- Nome
- Descrição
- Ano de Lançamento (opcional)
- Duração (opcional)
- Avaliação (opcional)
- Nota

#### 7. Manutenção de Tipo de Mídia:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O sistema deverá ser capaz de permitir que o usuário logado possa adicionar, excluir, editar e listar tipos de mídias. Cada mídia deverá possuir um tipo, para que possa ser melhor descrita (série, anime, filme, livro, jornais e etc). Os tipos de mídias deverão possuir:
- Indentificador próprio
- Nome
- Descrição (opcional)

#### 8. Manutenção de Autor:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O sistema deverá ser capaz de permitir que o usuário logado possa adicionar, excluir, editar e listar autores de mídias. Cada mídia deverá possuir um autor, para que possa ser melhor identificada e creditada. Os autores deverão possuir:
- Indentificador próprio
- Nome
- Descrição (opcional)
- Tipo
 
#### 9. Tutorial:
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; O sistema deverá ser responsável por mostrar ao usuário o que fazer.


## Desenvolvimento Real:

### Funções
- Autocadastro
- Login
- Logout
- Manutenção de Mídia
- Manutenção de Tipo de Mídia
- Manutenção de Autor

### Exclusões 
- Tutorial
- Exclusão de Usuário
- Edição de Usuário


### Lista de Entregas:
- [X] Parte I (28/04/2021): Descrição, Justificativa e Escopo Geral do Projeto
- [X] Parte II (16/06/2021): Mostrar Atualizações do Projeto: https://youtu.be/1leesdduDzU
- [ ] Parte III (30/06/2021): Entrega Final

### Integrantes do Projeto:
- @Otarossoni
- @Daniel-Conte
