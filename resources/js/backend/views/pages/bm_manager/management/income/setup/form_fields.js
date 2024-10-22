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
        type: "select",
        value: "",
        data_list: [],
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
        name: "income_source_type",
        label: "আয়ের উৎসের  ধরণ",
        type: "select",
        value: "",
        multiple: false,
        onchangeAction: 'getSelectedField',
        data_list: [
            {
                label: "শাখা",
                value: "শাখা"
            },
            {
                label: "বিভাগ",
                value: "বিভাগ"
            },
            {
                label: "ব্যাক্তি/প্রতিষ্ঠান",
                value: "ব্যাক্তি/প্রতিষ্ঠান"
            }
        ],

    },
    {
        name: "branch_id",
        label: "শাখার সমূহের ",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
        is_visible: false
    },
    {
        name: "central_division_id",
        label: "বিভাগ সমূহের ",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
        is_visible: false
    },
    {
        name: "random_user",
        label: "ব্যাক্তি/প্রতিষ্ঠানের নাম",
        type: "text",
        value: "",
        is_visible: false
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
