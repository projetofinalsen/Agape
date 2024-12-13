<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOSPITAL ÁGAPE</title>
    <link rel="stylesheet" href="agape.css">
</head>
<body>
    <header>
        <img src="icon.png" alt="logo hospital">
        <nav>
            <input type="checkbox" id="menucheck">
            <label for="menu" id="hamburguer">
                <img src="Hamburger_icon.svg (1).png" alt="icone menu">
            </label>
            <div id="menu">
                <ul>
                    <li><a href="#home">Home</a></li><br>
                    <li><a href="#sobre">Sobre</a></li><br>
                    <li><a href="#">Serviços</a></li><br>
                    <li><a href="#">Médicos</a></li><br>
                    <li><a href="#">Feedback</a></li><br>
                    <li><a href="#">Cadastro/Entrar</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <section id="home">

    </section>

    <section id="sobre">
        <h1>Sobre</h1>
        <div id="sobremain">
            <div id="textbox">
                <p>Fundado com o objetivo de transformar a vida das pessoas, nosso hospital se destaca por oferecer uma infraestrutura moderna, uma equipe de profissionais altamente capacitados e um ambiente acolhedor que coloca o bem-estar do paciente como prioridade.</p>
                <p>Nossa missão é proporcionar uma experiência de cuidado completa, levando em consideração as necessidades físicas, emocionais e sociais de cada paciente. Acreditamos que o vínculo de confiança e o cuidado humanizado são essenciais para a recuperação e o conforto de quem busca nossos serviços.</p>
                <p>Oferecemos uma ampla gama de especialidades médicas, com equipamentos de última geração, e estamos sempre à frente nas práticas de saúde, investindo em inovação e qualificação contínua. Nosso compromisso é com a qualidade, segurança e a saúde integral dos nossos pacientes, fazendo de cada atendimento uma experiência única e significativa.</p>
                <p>O nome Ágape, que simboliza o amor incondicional, reflete nossa filosofia: acolher e cuidar de cada pessoa com carinho e dedicação. Em nosso hospital, o paciente não é apenas mais um número, mas uma pessoa que merece todo o respeito, atenção e cuidado, independentemente de sua condição.</p>
                <p>Nosso compromisso com a excelência e a humanização é a base de todas as nossas ações. Estamos aqui para cuidar de você e da sua saúde, em cada passo da jornada.</p>
            </div>
        </div>
    </section>

    <section id="servico">  
        <h1>Serviços</h1>
        <div id="servicocol">
            <div class="servicebox"><img src="contacts.png" alt="" class="imagebox"><h3>Emergência</h3><br><p>Atendimento rápido e especializado para situações críticas. Equipe preparada para agir com urgência em casos de acidentes, doenças súbitas ou outras emergências.</p></div>
            <div class="servicebox"><img src="contacts.png" alt="" class="imagebox"><h3>Exames e procedimentos</h3><br><p>Diagnóstico preciso com exames e procedimentos médicos. Realizamos exames laboratoriais, de imagem e procedimentos especializados para diagnóstico e tratamento.</p></div>
            <div class="servicebox"><img src="contacts.png" alt="" class="imagebox"><h3>Consultas</h3><br><p>Atendimento médico personalizado e especializado. Consultas com médicos experientes para avaliação de sua saúde e acompanhamento contínuo.</p></div>
            <div class="servicebox"><img src="contacts.png" alt="" class="imagebox"><h3>Cirurgia</h3><br><p>Intervenções cirúrgicas seguras e eficazes. Equipe qualificada para realizar cirurgias eletivas ou de urgência com o máximo cuidado e precisão.</p></div>
            <div class="servicebox"><img src="contacts.png" alt="" class="imagebox"><h3>UTI</h3><br><p>Unidade de Terapia Intensiva com suporte completo. Cuidado intensivo para pacientes em estado grave, com monitoramento constante e tratamento especializado.</p></div>
            <div class="servicebox"><img src="contacts.png" alt="" class="imagebox"><h3>Internação</h3><br><p>Acomodação confortável e cuidados contínuos. Internação com atendimento médico 24 horas, infraestrutura moderna e ambiente acolhedor para recuperação.</p></div>
        </div>
    </section>

    <section id="medicos">
        <h1>Médicos</h1>
        <div id="medicosform">
            <form method="GET" action="">
                <label for="especialidade">Escolha a especialidade:</label>
                <select name="especialidade" id="especialidade">
                    <option value="Cardiologia">Cardiologia</option>
                    <option value="Pediatria">Pediatria</option>
                    <option value="Ortopedia">Ortopedia</option>
                    <option value="Dermatologia">Dermatologia</option>
                </select>
                <button type="submit">Ver Médicos</button>
            </form>
        </div>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['especialidade'])) {
                $especialidade = $_GET['especialidade']; 
                $conn = new mysqli("127.0.0.1", "root", "1234", "agape");

                if ($conn->connect_error) {
                    die("Falha na conexão: " . $conn->connect_error);
                }

                $sql = "SELECT nome, telefone FROM medicos WHERE especialidade = '$especialidade'";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Nome</th>";
                    echo "<th>Contato</th>";
                    echo "</tr>";
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["nome"] . "</td>";
                        echo "<td>" . $row["telefone"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    } else {
                        echo "Nenhum médico encontrado para a especialidade selecionada.";
                    }

                    $conn->close(); }
        ?>
    </section>

    <section id="feedback">
        <h1>Feedback</h1>
        <div id="feedbackmain">
        <?php

            $conn = new mysqli("127.0.0.1", "root", "1234", "agape");

            if ($conn->connect_error) {
                die("Falha na conexão: " . $conn->connect_error);
            }

            $sql = "SELECT nome, comentario FROM feedback";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div>";
                    echo "<h3>" . $row["nome"] . "</h3><br>";
                    echo "<p>" . $row["comentario"] . "</p>";
                    echo "</div>";
                }
                } else {
                    echo "Nenhum médico encontrado para a especialidade selecionada.";
                }

                $conn->close();
        ?>
        </div>
    </section>

    <section id="medico">
        <h1>Área Profissional</h1><br>
        <div id="medicomaino">
            <div id="medicomain">
                <h2>Profissional</h2><br>
                <div><h2>Deseja Trabalhar Conosco?</h2><br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure placeat odit porro eius quisquam corporis eligendi sapiente maiores vero doloremque non libero neque hic, labore tempore dicta. Inventore, dolores facilis!</p><br><h5><a href="formulariocliente.html">Cadastre-se aqui!</a></h5><br></div>
                <div><h2>Realize Seu Login</h2><br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure placeat odit porro eius quisquam corporis eligendi sapiente maiores vero doloremque non libero neque hic, labore tempore dicta. Inventore, dolores facilis!</p><br><h5><a href="">Fazer login</a></h5></div>
            </div>
            <div id="medicomain">
                <h2>Profissional</h2><br>
                <div><h2>Deseja Trabalhar Conosco?</h2><br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure placeat odit porro eius quisquam corporis eligendi sapiente maiores vero doloremque non libero neque hic, labore tempore dicta. Inventore, dolores facilis!</p><br><h5><a href="formulariomedico.html">Cadastre-se aqui!</a></h5><br></div>
                <div><h2>Realize Seu Login</h2><br><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure placeat odit porro eius quisquam corporis eligendi sapiente maiores vero doloremque non libero neque hic, labore tempore dicta. Inventore, dolores facilis!</p><br><h5><a href="">Fazer login</a></h5></div>
            </div>
        </div>
    </section>
</body>
</html>