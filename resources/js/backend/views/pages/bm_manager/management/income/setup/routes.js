import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

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
    ]
}


export default routes;
