import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";

const role = window.role.bmSupport

const routes = {

    path: 'monthly-income',
    component: Layout,
    children: [
        {
            path: '',
            name: role + "AllMonthlyIncome",
            component: All
        },
        {
            path: 'create',
            name: role + "CreateMonthlyIncome",
            component: Form
        },
        {
            path: 'balance',
            name: role + "MonthlyIncomeBalanceForm",
            component: BalanceForm
        },
    ]

}


export default routes;
