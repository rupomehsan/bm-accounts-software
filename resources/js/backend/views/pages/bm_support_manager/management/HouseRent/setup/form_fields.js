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
        name: "house_name",
        label: " House name",
        type: "text",
        value: "",
    },
    {
        name: "location",
        label: " House location",
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
        label: "Enter month",
        type: "date",
        value: moment().format('YYYY-MM-DD'),
    },


];
