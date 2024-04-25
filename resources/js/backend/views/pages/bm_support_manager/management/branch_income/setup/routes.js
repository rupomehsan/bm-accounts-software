import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: "branch-income",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "AllBranchIncome",
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "CreateBranchIncome",
            component: Form,
        },
    ],
};

export default routes;
