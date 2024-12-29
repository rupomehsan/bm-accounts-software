import Layout from "./Layout.vue";
import All from "../All.vue";
import Form from "../Form.vue";
import BalanceForm from "../BalanceForm.vue";
import KollanTohobilLedger from "../MainLedger.vue";
import KollanTohobilAllBranchIncome from "../AllBranchIncome.vue";

const role = window.role.bm

const routes = {

    path: 'kollan-tohobil',
    component: Layout,
    children: [
        {
            path: 'at-a-glance',
            name: role + "AllKollanTohobilAtAGlance",
            component: All
        },
        {
            path: 'branch-income',
            name: role + "KollanTohobilAllBranchIncome",
            component: KollanTohobilAllBranchIncome
        },
        {
            path: 'create',
            name: role + "CreateKollanTohobilIncome",
            component: Form
        },
        {
            path: 'balance',
            name: role + "KollanTohobilIncomeBalanceForm",
            component: BalanceForm
        },
        {
            path: 'ledger',
            name: role + "KollanTohobilLedger",
            component: KollanTohobilLedger
        },
    ]

}


export default routes;
