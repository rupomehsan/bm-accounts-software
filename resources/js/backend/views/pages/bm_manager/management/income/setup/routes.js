import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../../balanceForm/BalanceForm.vue";

const routes = {
    path: 'income',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllIncome",
            component: All
        },
        {
            path: 'create',
            name: "CreateIncome",
            component: Form
        },
        {
            path: 'balance',
            name: "BalanceForm",
            component: BalanceForm
        },
    ]
}


export default routes;
