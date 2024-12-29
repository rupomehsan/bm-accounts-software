import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";
import rolePrefix from "../../../partials/role_setup"
const role =  rolePrefix.role
const routes = {
    path: 'central-division-income',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllCentralDivisionIncome",
            component: All
        },
        {
            path: 'create',
            name: role+"CreateCentralDivisionIncome",
            component: Form
        },
        {
            path: 'balance',
            name: role+"DepartmentBalanceForm",
            component: BalanceForm
        },
    ]
}


export default routes;
