import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: "income",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "AllIncome",
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "CreateIncome",
            component: Form,
        },
    ],
};

export default routes;
