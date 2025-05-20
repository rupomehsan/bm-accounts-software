import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";
const role = window.role.bmSupport
const routes = {
    path: 'sohid-fund',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllSohidFund",
            component: All
        },
        {
            path: 'create',
            name: role+"CreateSohidFund",
            component: Form
        },
        {
            path: 'balance',
            name: role+"SohidFundBalanceForm",
            component: BalanceForm
        },
    ]
}


export default routes;
