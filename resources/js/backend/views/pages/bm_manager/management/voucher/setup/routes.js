import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BmTopShit from "../TopShit.vue";
import BmSetMonthForVouchers from "../SetVoucherMonth.vue";

const routes = {
    path: 'vouchers',
    component: Layout,
    children: [
        {
            path: '',
            name: "BmAllVouchers",
            component: All
        },
        {
            path: 'set-month',
            name: "BmSetMonthForVouchers",
            component: BmSetMonthForVouchers
        },
        {
            path: 'create',
            name: "BmCreateVoucher",
            component: Form
        },
        {
            path: 'topshit/:id',
            name: "BmTopShit",
            component: BmTopShit
        },
    ]
}


export default routes;
