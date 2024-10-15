import moment from "moment";

export default [
    {
        name: "account_receipt_book_id",
        label: "রশিদ বই নং",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },
    {
        name: "account_receipt_no",
        label: "রশিদ নং",
        type: "number",
        value: "",
    },
    {
        name: "date",
        label: "তারিখ",
        type: "date",
        value: moment().format('YYYY-MM-DD'),
    },
    {
        name: "account_category_id",
        label: "আয়ের খাত",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },
    {
        name: "branch_id",
        label: "শাখার নাম",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },
    {
        name: "random_user",
        label: "র‍্যান্ডোম ইউজার",
        type: "text",
        value: "",
    },
    {
        name: "description",
        label: "বিবরণ ",
        type: "textarea",
        value: "",
    },
    {
        name: "amount",
        label: "আয়ের পরিমাণ",
        type: "number",
        value: "",
    },
    {
        name: "amount_in_text",
        label: "আয়ের পরিমাণ (কথায়)",
        type: "text",
        value: "",
    },
    {
        name: "account_id",
        label: "আয়ের মাধ্যম",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },
    {
        name: "account_number_id",
        label: "Select account number",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },




];
