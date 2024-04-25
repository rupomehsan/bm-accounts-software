import moment from "moment";
export default [
    {
        name: "user_id",
        label: "Select user",
        type: "select",
        value: "",
        multiple: false,
        data_list: [],
    },
    {
        name: "office_name",
        label: " Office name",
        type: "text",
        value: "",
    },
    {
        name: "location",
        label: "Office location",
        type: "text",
        value: "",
    },
    {
        name: "amount",
        label: " amount",
        type: "number",
        value: "",
    },
    {
        name: "month",
        label: " month",
        type: "date",
        value: moment().format('YYYY-MM-DD'),
    },


];
