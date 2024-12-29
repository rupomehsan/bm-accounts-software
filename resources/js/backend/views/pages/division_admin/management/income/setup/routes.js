import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";

const role =  'DivisionAdmin'
const routes = {
    path: 'income',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllIncome",
            component: All
        },
        {
            path: 'create',
            name: role+"CreateIncome",
            component: Form
        },
        {
            path: 'balance',
            name: role+"BalanceForm",
            component: BalanceForm
        },
    ]
}


export default routes;
