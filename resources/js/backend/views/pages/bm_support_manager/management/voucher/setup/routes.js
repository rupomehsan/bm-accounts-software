import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BmTopShit from "../TopShit.vue";
import BmSetMonthForVouchers from "../SetVoucherMonth.vue";

const routes = {
    path: "vouchers",
    component: Layout,
    children: [
        {
            path: "",
            name: window.role.bmSupport + "BmAllVouchers",
            component: All,
        },
        {
            path: "set-month",
            name: window.role.bmSupport + "BmSetMonthForVouchers",
            component: BmSetMonthForVouchers,
        },
        {
            path: "create",
            name: window.role.bmSupport + "BmCreateVoucher",
            component: Form,
        },
        {
            path: "topshit/:id",
            name: window.role.bmSupport + "BmTopShit",
            component: BmTopShit,
        },
    ],
};

export default routes;
