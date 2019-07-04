import Home from './views/Home/Home'
import Manutencoes from './components/Manutencao/Manutencoes'
import Clientes from './components/Clientes/Clientes'

const routes = [
    {path:'/', name:'home', component: Home},
    {path:'/manutencoes', name:'manutencoes', component: Manutencoes},
    {path:'/clientes/:tipocliente', name:'clientes', component: Clientes},

]

export default routes