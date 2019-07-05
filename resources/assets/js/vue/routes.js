import Home from './views/Home/Home'
import Manutencoes from './components/Manutencao/Manutencoes'
import Clientes from './views/Clientes/Clientes'
import NovoCliente from './views/Clientes/NovoCliente'


const routes = [
    {path:'/', name:'home', component: Home},
    {path:'/manutencoes', name:'manutencoes', component: Manutencoes},
    {path:'/clientes/:tipocliente', name:'clientes', component: Clientes},
    {path:'/novo/cliente', name:'novocliente', component: NovoCliente},

]

export default routes