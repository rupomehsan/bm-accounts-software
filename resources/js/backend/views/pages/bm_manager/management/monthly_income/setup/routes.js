import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";

const routes = {
    path: 'monthly-income',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllDailyIncome",
            component: All
        },
        {
            path: 'create',
            name: "CreateDailyIncome",
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
