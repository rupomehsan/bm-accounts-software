import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'receipt-books',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllReceiptBook",
            component: All
        },
        {
            path: 'create',
            name: "ReceiptBookCreate",
            component: Form
        },
    ]
}


export default routes;
