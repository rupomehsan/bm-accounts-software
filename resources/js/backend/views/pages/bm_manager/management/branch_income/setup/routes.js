import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";
import rolePrefix from "../../../partials/role_setup"
const role =  rolePrefix.role
const routes = {
    path: 'branch-income',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllBranchIncome",
            component: All
        },
        {
            path: 'create',
            name: role+"CreateBranchIncome",
            component: Form
        },
        {
            path: 'balance',
            name: role+"BranchIncomeBalanceForm",
            component: BalanceForm
        },
    ]
}


export default routes;
