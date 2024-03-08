import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'branch-target',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllBranchTarget",
            component: All
        },
        {
            path: 'create',
            name: "BranchTargetCreate",
            component: Form
        },
    ]
}


export default routes;
