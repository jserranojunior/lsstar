import Home from './views/Home/Home'
import Manutencoes from './components/Manutencao/Manutencoes'
import Clientes from './views/Clientes/Clientes'
import NewOrEditCliente from './views/Clientes/NewOrEditCliente'
import NewOrEditEmpreendimento from './views/Empreendimentos/NewOrEditEmpreendimento'
import Visitas from './views/LasPalmas/Visitas'
import NovoClienteLasPalmas from './views/LasPalmas/NovoClienteLasPalmas'
import Empreendimentos from './views/Empreendimentos/Empreendimentos'

import PagamentoEmitido from './components/Financeiro/PagamentoEmitido'

const routes = [
    {path:'/', name:'home', component: Home},
    {path:'/manutencoes', name:'manutencoes', component: Manutencoes},
    {path:'/clientes/:tipocliente', name:'clientes', component: Clientes},
    {path:'/novo/cliente', name:'novocliente', component: NewOrEditCliente},
    {path:'/novo/cliente/:id', name:'novoclienteid', component: NewOrEditCliente},
    {path:'/laspalmas/visitas', name:'visitaslaspalmas', component: Visitas},
    {path:'/laspalmas/novocliente', name:'novoclientelaspalmas', component: NovoClienteLasPalmas},
    {path:'/empreendimentos/:tipoempreendimento', name:'empreendimentos', component: Empreendimentos},
    {path:'/novo/empreendimento', name:'novoempreendimento', component: NewOrEditEmpreendimento},
    {path:'/novo/empreendimento/:id', name:'novoempreendimentoid', component: NewOrEditEmpreendimento},

    {path:'/financeiro/pagamentoemitido/:id', name:'pagamentoemitido', component: PagamentoEmitido},
]

export default routes