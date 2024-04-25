import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: "receipt-books",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "AllReceiptBook",
            component: All,
        },
        {
            path: "create",
            name: window.role.bmSupport + "ReceiptBookCreate",
            component: Form,
        },
    ],
};

export default routes;
