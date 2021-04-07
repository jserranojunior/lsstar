export function imageStorageLink(value) {
  if (value) {
    let urlStorage = process.env.VUE_APP_LARAVEL_STORAGE_URL;
    var avatar = urlStorage + "/" + value;
    return avatar;
  }
}

export function mainTogleSecondary() {
  const mainScreen = document.querySelectorAll(".main-screen");
  const secondaryScreen = document.querySelector(".secondary-screen");
  if (mainScreen && secondaryScreen) {
    mainScreen.forEach((item) => {
      item.classList.toggle("hidden");
    });
    secondaryScreen.classList.toggle("hidden");
  }
}

export function mainTogleTertiary() {
  const mainScreen = document.querySelector(".main-screen");
  const tertiaryScreen = document.querySelector(".tertiary-screen");
  if (mainScreen && tertiaryScreen) {
    mainScreen.classList.toggle("hidden");
    tertiaryScreen.classList.toggle("hidden");
  }
}

export function converterDateCalendar(value) {
  var data = value.replace(/-/g, ",");
  var options = {
    year: "numeric",
    month: "2-digit",
    day: "2-digit",
  };
  var today = new Date(data);
  var dataConvertida = new Date(today).toLocaleDateString("pt-BR", options);
  return dataConvertida;
}

export function dataFormatoBr(value) {
  var options = {
    year: "numeric",
    month: "2-digit",
    day: "2-digit",
  };

  if (value) {
    if (value.indexOf("T") >= 0) {
      value = new Date(value).toLocaleDateString("pt-BR", options);
    } else if (value.indexOf("-") >= 0) {
      value = value.replace(/-/g, ",");
      value = new Date(value).toLocaleDateString("pt-BR", options);
    }
    return value;
  }
}

function calcularIdadeComMeses(value) {
  const ano = calcularAnosIdade(value);
  const meses = mesesDeVidaNoAnoAtual(value);
  return `${ano} anos e ${meses} meses`;
}

function calcularAnosIdade(value) {
  if (value.length == 10) {
    var nascimento = value.split("-");
    var dataNascimento = new Date(
      parseInt(nascimento[0], 10),
      parseInt(nascimento[1], 10) - 1,
      parseInt(nascimento[2], 10)
    );
    var diferenca = Date.now() - dataNascimento.getTime();
    var calIdade = new Date(diferenca);
    var idade = Math.abs(calIdade.getUTCFullYear() - 1970);
    return idade;
  }
}
function mesesDeVidaNoAnoAtual(value) {
  if (value.length == 10) {
    var nascimento = value.split("-");
    var dataNascimento = new Date(
      parseInt(nascimento[0], 10),
      parseInt(nascimento[1], 10) - 1,
      parseInt(nascimento[2], 10)
    );
    const today = new Date();
    const mesAtual = parseInt(today.getMonth() + 1);
    const diaAtual = parseInt(today.getDate());

    var meses = 0;
    var mesesFalta = 0;
    var mesNascimento = parseInt(dataNascimento.getMonth() + 1);
    var diaNascimento = parseInt(dataNascimento.getDate());

    console.log("Mes Atual: ", mesAtual, "Mes de nascimento: ", mesNascimento);

    if (mesNascimento > mesAtual) {
      mesesFalta = mesNascimento - mesAtual;
      meses = 12 - mesesFalta;
      if (diaNascimento < diaAtual) {
        meses = meses - 1;
      }
    } else if (mesNascimento < mesAtual) {
      mesesFalta = mesNascimento + mesAtual;
      meses = 12 - mesesFalta;
      if (diaNascimento < diaAtual) {
        meses = meses - 1;
      }
    } else {
      if (diaNascimento < diaAtual) {
        meses = 11;
      } else {
        meses = 0;
      }
    }

    return meses;
  }
}

// 19 anos e 7 meses
export function idadeComMeses(value) {
  return calcularIdadeComMeses(value);
}

export function limitarTexto(value, tamanho) {
  if (!value) return "";
  value = value.toString();
  return value.substring(0, tamanho) + " ...";
}
