import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";

const routes = {
    path: 'sohid-fund',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllSohidFund",
            component: All
        },
        {
            path: 'create',
            name: "CreateSohidFund",
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
