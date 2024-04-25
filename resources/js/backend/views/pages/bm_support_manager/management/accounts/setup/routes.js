import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: "accounts",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "AllPaymentMethod",
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "CreatePaymentMethod",
            component: Form,
        },
    ],
};

export default routes;
