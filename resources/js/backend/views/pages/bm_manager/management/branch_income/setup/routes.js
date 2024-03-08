import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

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
    ]
}


export default routes;
