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
    path: 'bm-at-a-glance',
    component: Layout,

    children: [

        {
            path: '',
            name: "AtAGlance",
            component: All
        },
        {
            path: 'expense',
            name: "Expense",
            component: Expense
        },
        {
            path: 'আয়ের-লেজার/খতিয়ান',
            name: "IncomeLedger",
            component: IncomeLedger
        },
        {
            path: 'ব্যয়ের-লেজার/খতিয়ান',
            name: "ExpenseLedger",
            component: ExpenseLedger
        },
        {
            path: 'ঋণ-রেজিস্টার',
            name: "LoanRegister",
            component: LoanRegister
        },
        {
            path: 'জামানত',
            name: "Jamanot",
            component: Jamanot
        },
        {
            path: 'বেতন',
            name: "Salary",
            component: Salary
        },
        {
            path: 'অফিস-ভাড়া',
            name: "OfficeRent",
            component: OfficeRent
        },
        {
            path: 'বাসা-ভাড়া',
            name: "HouseRent",
            component: HouseRent
        },
        {
            path: 'সম্পদ-তালিকা',
            name: "AssetList",
            component: AssetList
        },
        {
            path: 'বিএম-স্টক-রেজিস্টার',
            name: "BMStockRegister",
            component: BMStockRegister
        },
        {
            path: 'সম্পদ-রেজিস্টার',
            name: "AssetRegister",
            component: AssetRegister
        },
        {
            path: 'এককালীন-প্রদান',
            name: "EkkalinProdan",
            component: EkkalinProdan
        },
        {
            path: 'নিয়মিত-প্রদান',
            name: "NiyomitoProdan",
            component: NiyomitoProdan
        },
        {
            path: 'কেন্দ্রীয়-শুভাকাঙ্খী-থেকে-আয়',
            name: "KendriyoSuvakankhiThekeAy",
            component: KendriyoSuvakankhiThekeAy
        },

    ]
}


export default routes;
