import moment from "moment";

export default [
    {
        name: "user_id",
        label: "Select provider ",
        type: "select",
        value: "",
        multiple: false,
        data_list: []
    },
    {
        name: "category_id",
        label: "Select category",
        type: "select",
        value: "",
        multiple: false,
        data_list: []
    },
    {
        name: "amount",
        label: "Enter your amount",
        type: "number",
        value: "",
    },
    {
        name: "amount_in_text",
        label: "Enter your amount in text",
        type: "text",
        value: "",
    },
    {
        name: "date",
        label: "Enter  date",
        type: "date",
        value: moment().format('YYYY-MM-DD'),
    },
    {
        name: "description",
        label: "Enter your desciption",
        type: "textarea",
        value: "",
    },
    {
        name: "attachment",
        label: "Upload your attachment",
        type: "file",
        value: '',
        multiple: false,
    },

];
