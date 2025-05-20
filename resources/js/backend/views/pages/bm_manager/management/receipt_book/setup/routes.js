import Layout from "./Layout.vue";
import All from "../All.vue";
import AllRejectedReceiptBook from "../AllRejectedReceiptBooks.vue";
import Form from "../Form.vue";
import Details from "../Details.vue";
import rolePrefix from "../../../partials/role_setup";
const role = rolePrefix.role;
const routes = {
    path: "receipt-books",
    component: Layout,
    children: [
        {
            path: "",
            name: role + "AllReceiptBook",
            component: All,
        },
        {
            path: "rejected",
            name: role + "AllRejectedReceiptBook",
            component: AllRejectedReceiptBook,
        },
        {
            path: "create",
            name: role + "ReceiptBookCreate",
            component: Form,
        },
        {
            path: "details",
            name: role + "ReceiptBookDetils",
            component: Details,
        },
    ],
};

export default routes;
