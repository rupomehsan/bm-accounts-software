import moment from "moment";

export default [
    {
        name: "user_id",
        label: "Select provider user",
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
        name: "taken_date",
        label: "Enter loan taken date",
        type: "date",
        value: moment().format('YYYY-MM-DD'),
    },

    {
        name: "given_date",
        label: "Enter loan given date",
        type: "date",
        value: moment().format('YYYY-MM-DD'),
    },

    {
        name: "purpose",
        label: "Enter your purpose",
        type: "text",
        value: "",
    },
    {
        name: "appropriator",
        label: "Enter  appropriator",
        type: "text",
        value: "",
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
