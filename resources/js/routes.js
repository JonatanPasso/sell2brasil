import TesteSellBrasil from "./components/TesteSellBrasil";
import home from "./components/home";

export default [
    {
        path: '/crud',
        component: TesteSellBrasil,
        meta: {
            title: 'Teste de Crud Sell2Brasil'
        }
    },
    {
        path: '/',
        component: home,
        meta: {
            title: 'Home'
        },
    }
]

