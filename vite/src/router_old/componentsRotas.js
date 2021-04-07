// ROTAS ADMIN

import PresencaObreiro from "@/modules/administrador/presencaobreiro/pages/PresencaObreiro.vue";
import EditarPagina from "@/modules/administrador/editarpaginas/pages/EditarPagina.vue";
import Birthdays from "@/modules/administrador/aniversariantes/pages/Birthdays.vue";

import RotasAcessos from "@/modules/administrador/rotaseacessos/pages/RotasAcessos.vue";
import Acessos from "@/modules/administrador/rotaseacessos/pages/Acessos.vue";
import GerenciarFrequentadores from "@/modules/administrador/gerenciarusuarios/pages/GerenciarFrequentadores.vue";

import GerenciarObreiros from "@/modules/administrador/gerenciarusuarios/pages/GerenciarObreiros.vue";

import PerfisDeUsuarios from "@/modules/administrador/perfisdeusuarios/pages/PerfisDeUsuarios.vue";

// ROTAS OBREIRO
//||  ROTAS PASSES
import AtendimentosPasses from "@/modules/obreiro/passes/pages/AtendimentosPasses.vue";

import ConfirmacaoPasses from "@/modules/obreiro/passes/pages/ConfirmacaoPasses.vue";
//|| ROTAS OBREIRO EVANGELHO
import AtendimentosEvangelho from "@/modules/obreiro/evangelho/pages/AtendimentosEvangelho.vue";
import ConfirmacaoEvangelho from "@/modules/obreiro/evangelho/pages/ConfirmacaoEvangelho.vue";
//|| ROTAS APOMETRIA
import DatasDesativadasCalendarioApometria from "@/modules/obreiro/apometria/pages/DatasDesativadasCalendarioApometria.vue";

import ProgramacaoApometria from "@/modules/obreiro/apometria/pages/ProgramacaoApometria.vue";
import ConfirmacaoApometria from "@/modules/obreiro/apometria/pages/ConfirmacaoApometria.vue";
import RodadasMacas from "@/modules/obreiro/apometria/pages/RodadasMacas.vue";
import RelacaoAtendidos from "@/modules/obreiro/apometria/pages/RelacaoAtendidos.vue";
import EntrevistaPreAtendimento from "@/modules/obreiro/apometria/pages/EntrevistaPreAtendimento.vue";
import LeituraDasFichas from "@/modules/obreiro/apometria/pages/LeituraDasFichas.vue";
import CabeceiraDaMaca from "@/modules/obreiro/apometria/pages/CabeceiraDaMaca.vue";
import PosAtendimento from "@/modules/obreiro/apometria/pages/PosAtendimento.vue";
// APOMETRIA ENCERRAMENTO
import EntrevistaDeEncerramento from "@/modules/obreiro/apometria/pages/EntrevistaDeEncerramento.vue";
import EncerramentosNaoRetornou from "@/modules/obreiro/apometria/pages/EncerramentosNaoRetornou.vue";
import EncerramentosConcluidos from "@/modules/obreiro/apometria/pages/EncerramentosConcluidos.vue";
import EncerramentosSemRetorno from "@/modules/obreiro/apometria/pages/EncerramentosSemRetorno.vue";

// ROTAS OBREIROS DA LUZ
import BlocosDeAtendimento from "@/modules/obreiro/obreirosdaluz/blocosdeatendimento/pages/BlocosDeAtendimento.vue";

import Televisao from "@/modules/obreiro/obreirosdaluz/televisaoobreirosdaluz/pages/Televisao.vue";

import MediunsCambonos from "@/modules/obreiro/obreirosdaluz/pages/MediunsCambonos.vue";
import PresencaMediumECambonos from "@/modules/obreiro/obreirosdaluz/pages/PresencaMediumECambonos.vue";
import AtendimentosLuz from "@/modules/obreiro/obreirosdaluz/pages/AtendimentosLuz.vue";
import ControledeAtendimentoLuz from "@/modules/obreiro/obreirosdaluz/pages/ControledeAtendimentoLuz.vue";
import CadastroDeGiraLuz from "@/modules/obreiro/obreirosdaluz/pages/CadastroDeGiraLuz.vue";

// // // MENU
import Home from "@/modules/menu/site/pages/Home.vue";
import Pagina from "@/modules/menu/site/pages/Paginas.vue";
import Contato from "@/modules/menu/site/pages/Contato.vue";

// // // Carteirinhas
import CarteirinhaObreiro from "@/modules/carteirinhas/pages/CarteirinhaObreiro.vue";
import CarteirinhaFrequentador from "@/modules/carteirinhas/pages/CarteirinhaFrequentador.vue";

// // // ARRUMAR E TIRAR DAS ROTAS
import Qrcode from "@/modules/carteirinhas/components/Qrcode.vue";
import Editor from "@/modules/administrador/editarpaginas/components/Editor.vue";
import CalendarioProgramacaoApometria from "@/views/layouts/calendario/Calendario.vue";
import EnviarEmail from "@/modules/administrador/email/EnviarEmail.vue";

// // // AUTH
import Login from "@/modules/auth/pages/Login.vue";
import Register from "@/modules/auth/pages/Register.vue";

// // // ROTAS FREQUENTADOR
import SolicitarAtendimento from "@/modules/solicitaratendimento/pages/SolicitarAtendimento.vue";
import Frequentador from "@/modules/meusdados/pages/MeusDados.vue";

var components = {
  Home: Home,
  Login: Login,
  Pagina: Pagina,
  Contato: Contato,
  Frequentador: Frequentador,
  RotasAcessos: RotasAcessos,
  Acessos: Acessos,
  EditarPagina: EditarPagina,
  Editor: Editor,
  CalendarioProgramacaoApometria,
  CarteirinhaFrequentador: CarteirinhaFrequentador,
  Qrcode: Qrcode,
  Register: Register,
  GerenciarObreiros: GerenciarObreiros,
  GerenciarFrequentadores: GerenciarFrequentadores,
  DatasDesativadasCalendarioApometria: DatasDesativadasCalendarioApometria,
  CarteirinhaObreiro: CarteirinhaObreiro,
  AtendimentosPasses: AtendimentosPasses,
  AtendimentosLuz: AtendimentosLuz,
  AtendimentosEvangelho: AtendimentosEvangelho,
  ProgramacaoApometria: ProgramacaoApometria,
  ConfirmacaoApometria: ConfirmacaoApometria,
  RelacaoAtendidos: RelacaoAtendidos,
  RodadasMacas: RodadasMacas,
  EntrevistaPreAtendimento: EntrevistaPreAtendimento,
  LeituraDasFichas: LeituraDasFichas,
  CabeceiraDaMaca: CabeceiraDaMaca,
  EntrevistaDeEncerramento: EntrevistaDeEncerramento,
  PosAtendimento: PosAtendimento,
  SolicitarAtendimento: SolicitarAtendimento,
  PerfisDeUsuarios: PerfisDeUsuarios,
  EnviarEmail: EnviarEmail,
  CadastroMediunsCambonos: MediunsCambonos,
  PresencaMediumECambonos: PresencaMediumECambonos,
  ControledeAtendimentoLuz: ControledeAtendimentoLuz,
  EncerramentosNaoRetornou: EncerramentosNaoRetornou,
  EncerramentosSemRetorno: EncerramentosSemRetorno,
  EncerramentosConcluidos: EncerramentosConcluidos,
  CadastroDeGiraLuz,
  Birthdays,
  Televisao,
  PresencaObreiro,
  BlocosDeAtendimento,
  ConfirmacaoPasses,
  ConfirmacaoEvangelho,
};

export default components;
