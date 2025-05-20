import Layout from "./Layout.vue";
import All from "../All.vue";
import rolePrefix from "../../../partials/role_setup"
const role =  rolePrefix.role
const routes = {
    path: 'income-source',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllIncomeSource",
            component: All
        },
    ]
}


export default routes;
