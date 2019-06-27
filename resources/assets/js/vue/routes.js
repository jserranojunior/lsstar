import Home from './views/Home/Home'
import Manutencoes from './components/Manutencao/Manutencoes'


const routes = [
    {path:'/', name:'home', component: Home},
    {path:'/manutencoes', name:'manutencoes', component: Manutencoes},
  

]

export default routes