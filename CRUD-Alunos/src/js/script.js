function incluir() {
    let nome = document.getElementById("nome").value;
    let matricula = document.getElementById("matri").value;
    let email = document.getElementById("email").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else
        if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else
            console.log("Requisicao falhou: " + this.status);
    }

    xmlhttp.open("POST", "http://localhost/3DAW/CRUD-Alunos/src/php/incluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("nome=" + nome + "&matricula=" + matricula + "&email=" + email);    
}

function alterar() {
    let matricula = document.getElementById("matriAlt").value;
    let email = document.getElementById("novoemail").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else
        if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else
            console.log("Requisicao falhou: " + this.status);
    }

    xmlhttp.open("POST", "http://localhost/3DAW/CRUD-Alunos/src/php/alterar.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("matricula=" + matricula + "&email=" + email);
}

function excluir() {
    let matricula = document.getElementById("matriExc").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else
        if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else
            console.log("Requisicao falhou: " + this.status);
    }

    xmlhttp.open("POST", "http://localhost/3DAW/CRUD-Alunos/src/php/excluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("matricula=" + matricula);
}

function listarUm() {

}

function listarTodos() {
    
}

function menuTest (type) {
    displayReset();
    document.getElementById(type).style.display = "block";        
}

function displayReset() {
    for (var i = 1; i <= 5; i++) {
        var element = document.getElementById(i.toString());
        if (element) {
            element.style.display = 'none'; 
        }   
    }
}


    function BuscarPergunta(pId) {
            let xmlhttp = new XMLHttpRequest();
            console.log("1");
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("msg").innerHTML = this.responseText;                    
                    let objReturnJSON = JSON.parse(this.responseText);
                //    let objReturnJSON = JSON.parse(this.responseText);
                    document.getElementById("id").value = objReturnJSON.id;
                    document.getElementById("pergunta").value = objReturnJSON.pergunta;
                    document.getElementById("tipo").value = objReturnJSON.tipo;
                    document.getElementById("mdForm").style.display = "block";
                } else
                if (this.readyState < 4) {
                    console.log("3: " + this.readyState);
                } else
                    console.log("Requisicao falhou: " + this.status);
            }
            console.log("4");
            xmlhttp.open("GET", "http://localhost/3dawmanha/ex55_ListarPerguntaDB.php?id=" + pId);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send();
    }
    function ListarPerguntas() {
      let xmlhttp = new XMLHttpRequest();
      console.log("1");
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          console.log("Chegou a resposta OK: " + this.responseText);
          console.log("2");
          document.getElementById("msg").innerHTML = this.responseText;
          let objReturnJSON = JSON.parse(this.responseText);
          console.log("Resposta: " + this.responseText);
          for ($i=0; $i<objReturnJSON.length; $i++) {
            let $linha = objReturnJSON[$i];
            CriarLinhaTabela(objReturnJSON[$i]);
          }
        } else
        if (this.readyState < 4) {
          console.log("3: " + this.readyState);
        } else
          console.log("Requisicao falhou: " + this.status);
      }
      console.log("4");
      // xmlhttp.open("GET", "http://localhost/3dawmanha2/ex52_IncluirAluno.php?id=" + id +
      //                 "&nome=" + nome + "&email=" + email);
      xmlhttp.open("GET", "http://localhost/3dawmanha/ex55_ListarPerguntaDB.php");
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send();
      // xmlhttp.send();
      console.log("enviei request get");
      console.log("5");
    }
    
    function CriarLinhaTabela(pobjReturnJSON) {
      let tr = document.createElement("tr");
      let td = document.createElement("td");
      let textNode = document.createTextNode(pobjReturnJSON.pergunta);
      td.appendChild(textNode);
      tr.appendChild(td);

      let td2 = document.createElement("td"); // cria o element td
      textnode = document.createTextNode(pobjReturnJSON.tipo);
      td2.appendChild(textnode); // adiciona o texto na td criada
      tr.appendChild(td2); // adiciona a td na tr

      let td3 = document.createElement("td"); // cria o element td
      textnode = document.createTextNode(pobjReturnJSON.id);
      td2.appendChild(textnode); // adiciona o texto na td criada
      tr.appendChild(td3); // adiciona a td na tr

      let td4 = document.createElement("td"); // cria o element td
      let tagP = document.createElement("span", "onclick");
      let textnode1 = "buscarPergunta('" + pobjReturnJSON.id + "')";
      tagP.setAttribute("onclick",textnode1);
      textnode = document.createTextNode("Alterar");
      tagP.appendChild(textnode);
      tr.appendChild(td4);

      var tr_fim = document.getElementById("ultimalinha");
//      tr_fim.parentNode.insertBefore(tr,tr_fim);
//      tr_fim.parentElement.insertBefore(tr,tr_fim);

      let msg = "";

      return msg;
    }
