import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";

const routes = {
    path: 'branch-income',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllBranchIncome",
            component: All
        },
        {
            path: 'create',
            name: "CreateBranchIncome",
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
