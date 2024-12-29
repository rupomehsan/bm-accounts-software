import Layout from "./Layout.vue";
import All from "../All.vue";
import Expense from "../Expense.vue";
import LoanRegister from "../LoanRegister.vue";
import Jamanot from "../Jamanot.vue";
import Salary from "../Salary.vue";
import OfficeRent from "../OfficeRent.vue";
import HouseRent from "../HouseRent.vue";
import AssetList from "../AssetList.vue";
import BMStockRegister from "../BMStockRegister.vue";
import AssetRegister from "../AssetRegister.vue";
import EkkalinProdan from "../EkkalinProdan.vue";
import NiyomitoProdan from "../NiyomitoProdan.vue";
import KendriyoSuvakankhiThekeAy from "../KendriyoSuvakankhiThekeAy.vue";
import IncomeLedger from "../IncomeLedger.vue";
import ExpenseLedger from "../ExpenseLedger.vue";

const routes = {
    path: "bm-at-a-glance",
    component: Layout,

    children: [
        {
            path: "income",
            name: "AtAGlance",
            component: All,
        },
        {
            path: "expense",
            name: "Expense",
            component: Expense,
        },
        {
            path: "income-ledger",
            name: "IncomeLedger",
            component: IncomeLedger,
        },
        {
            path: "expense-ledger",
            name: "ExpenseLedger",
            component: ExpenseLedger,
        },
        {
            path: "loan-register",
            name: "LoanRegister",
            component: LoanRegister,
        },
        {
            path: "jamanot",
            name: "Jamanot",
            component: Jamanot,
        },
        {
            path: "salary",
            name: "Salary",
            component: Salary,
        },
        {
            path: "office-rent",
            name: "OfficeRent",
            component: OfficeRent,
        },
        {
            path: "house-rent",
            name: "HouseRent",
            component: HouseRent,
        },
        {
            path: "asset-list",
            name: "AssetList",
            component: AssetList,
        },
        {
            path: "bm-stock-register",
            name: "BMStockRegister",
            component: BMStockRegister,
        },
        {
            path: "asset-register",
            name: "AssetRegister",
            component: AssetRegister,
        },
        {
            path: "lump-sum-payment",
            name: "EkkalinProdan",
            component: EkkalinProdan,
        },
        {
            path: "regular-paying",
            name: "NiyomitoProdan",
            component: NiyomitoProdan,
        },
        {
            path: "Central-Auspicious-to-Income",
            name: "KendriyoSuvakankhiThekeAy",
            component: KendriyoSuvakankhiThekeAy,
        },
    ],
};

export default routes;
