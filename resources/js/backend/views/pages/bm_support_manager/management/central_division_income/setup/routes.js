import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'central-division-income',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllCentralDivisionIncome",
            component: All
        },
        {
            path: 'create',
            name: "CreateCentralDivisionIncome",
            component: Form
        },
    ]
}


export default routes;
