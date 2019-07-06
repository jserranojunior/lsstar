import Home from './views/Home/Home'
import Manutencoes from './components/Manutencao/Manutencoes'
import Clientes from './views/Clientes/Clientes'
import NewOrEditCliente from './views/Clientes/NewOrEditCliente'


const routes = [
    {path:'/', name:'home', component: Home},
    {path:'/manutencoes', name:'manutencoes', component: Manutencoes},
    {path:'/clientes/:tipocliente', name:'clientes', component: Clientes},
    {path:'/novo/cliente', name:'novocliente', component: NewOrEditCliente},
    {path:'/novo/cliente/:id', name:'novoclienteid', component: NewOrEditCliente},

]

export default routes