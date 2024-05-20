import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";

const role = window.role.bm

const routes = {

    path: 'kollan-tohobil-income',
    component: Layout,
    children: [
        {
            path: '',
            name: role + "AllKollanTohobilIncome",
            component: All
        },
        {
            path: 'create',
            name: role + "CreateKollanTohobilIncome",
            component: Form
        },
        {
            path: 'balance',
            name: role + "KollanTohobilIncomeBalanceForm",
            component: BalanceForm
        },
    ]

}


export default routes;
