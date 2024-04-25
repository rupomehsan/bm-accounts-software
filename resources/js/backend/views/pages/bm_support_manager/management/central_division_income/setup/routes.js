import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: "central-division-income",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "AllCentralDivisionIncome",
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "CreateCentralDivisionIncome",
            component: Form,
        },
    ],
};

export default routes;
