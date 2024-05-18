import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import rolePrefix from "../../../partials/role_setup"
const role =  rolePrefix.role
const routes = {
    path: 'branch-target',
    component: Layout,
    children: [
        {
            path: '',
            name: role+"AllBranchTarget",
            component: All
        },
        {
            path: 'create',
            name: role+"BranchTargetCreate",
            component: Form
        },
    ]
}


export default routes;
