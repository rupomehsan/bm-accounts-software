import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";

const routes = {
    path: 'not-approved-by-bm-vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: "BmNotApprovedByBmVoucher",
            component: All
        },
        {
            path: 'details',
            name: "BmNotApprovedForm",
            component: Form
        },

    ]
}


export default routes;
