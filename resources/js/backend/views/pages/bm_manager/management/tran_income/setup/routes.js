import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";

const role = window.role.bm

const routes = {

    path: 'tran-income',
    component: Layout,
    children: [
        {
            path: '',
            name: role + "AllTranIncome",
            component: All
        },
        {
            path: 'create',
            name: role + "CreateTranIncome",
            component: Form
        },
        {
            path: 'balance',
            name: role + "TranIncomeBalanceForm",
            component: BalanceForm
        },
    ]

}


export default routes;
