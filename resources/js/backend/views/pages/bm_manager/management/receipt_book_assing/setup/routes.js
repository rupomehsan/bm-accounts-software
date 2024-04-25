import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'receipt-books-assign',
    component: Layout,
    children: [
        {
            path: '',
            name: "AllAssignReceiptBook",
            component: All
        },
        {
            path: 'create',
            name: "AssingReceiptBookCreate",
            component: Form
        },
    ]
}


export default routes;
