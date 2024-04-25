import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: "receipt-books-assign",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "AllAssignReceiptBook",
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "AssingReceiptBookCreate",
            component: Form,
        },
    ],
};

export default routes;
