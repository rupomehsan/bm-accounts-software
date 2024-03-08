import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import DATopshit from "../DATopshit.vue";

const routes = {
    path: 'vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: "AdminAllVouchers",
            component: All
        },
        {
            path: 'create',
            name: "AdminCreateVoucher",
            component: Form
        },
        {
            path: 'topshit/:id',
            name: "DATopshit",
            component: DATopshit
        },

    ]
}


export default routes;
